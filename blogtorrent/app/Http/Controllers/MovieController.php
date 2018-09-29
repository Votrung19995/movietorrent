<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Category;
use App\Glo;
use DateTime;
use Config;
use Illuminate\Support\Facades\Crypt;
use App\GibberishAES;
use Redirect;
use Response;
use Counter;
use App\UserToken;


class MovieController extends Controller
{
    //go to movie detail:
    public function movieDetail(Request $request, $slug){
        //remove session:
        session()->forget('serverId');
        session()->forget('links');
        //get current day:
        $currentDay = new DateTime();
        $detail = Inventory::where('slug','=',$slug)->first();
        if(!empty($detail)){
            //get category:
            $category = Category::where('categoryid',$detail->categoryid)->first();
            //get global:
            $global = Glo::where('globalid',$detail->globalid)->first();
            //get related movie:
            $relates = Inventory::where('categoryid','=',$detail->categoryid)->orderByRaw('RAND()')->take(8)->orderBy('created', 'desc')->skip(0)->get();
            //get trailer phim:
            $body = explode('https://www.youtube.com/watch?v=', $detail->trailer);
            $trailer = $body[1];
            return view('movie')->with(array('movie'=>$detail,'category'=>$category->name, 'trailer'=>$trailer, 'global'=>$global->name, 'relates'=>$relates, 'currentDay'=>$currentDay));
        }
        else{
            return redirect('/redirect/404');
        }
    }
    
    //watch movie:
    public function watch($slug){
        //get current day:
        $currentDay = new DateTime();
        //get most viewed movie:
        $mosts = Inventory::where('categoryid','!=',6)->take(10)->orderBy('count', 'desc')->skip(0)->get();
        //set slug:
        $sec = session('serverId');
        $serverId = 0;
		if(!empty($sec)){
			$serverId = $sec->globalid;
		}
        $movie = Inventory::where('slug',$slug)->first();
        //get category:
        $category = Category::where('categoryid',$movie->categoryid)->first();
        //get global:
        $global = Glo::where('globalid',$movie->globalid)->first();

        //update counter:
        //count vistor in page:
        Counter::count('view-movie', $movie->slug);
        //get counter of page:
        $count = Counter::show('view-movie', $movie->slug);
        error_log($movie->slug.'COUNTER: '.$count);
        Inventory::where('slug', '=', $movie->slug)->update(['count' => $count]);
        //get array links stream:
        $streams = [];
        if(strlen($movie->stream) > 0) {
           error_log('LENGHT 1: '.strlen($movie->stream));
           array_push($streams, $movie->stream);
        }
        if(strlen($movie->stream2) > 0){
           array_push($streams, $movie->stream2);
        }
        //get user_token:
        $userToken = UserToken::get()->first();
        $sources = [];
        if(count($streams) > 0){
            $sources =  $this->getSourceVideo($userToken->app_id, $userToken->app_secret,$streams, $userToken->access_token);
        }
        //get araay link stream:
        if(count($sources) == 0){
            array_push($sources, "link not found");
            error_log("======> ALL link not found");
        }
        //check link:
        if(!empty($movie)){
            return view('watch')->with(array('movie'=>$movie,'category'=>$category->name,'play'=> $sources[$serverId],'links'=> $sources,'global'=>$global->name,'serverId'=>$serverId, 'mosts'=>$mosts, 'currentDay'=>$currentDay));
        }
        else{
            return "<script>alert('Link xem chưa được cập nhật!');history.back(-2)'</script>";
        }
    }

    public function getSourceVideo($appID, $appSecret, $streams, $accees_token){
        $links = [];
        //call facebook api:
        $fb = $this->initFaceBookAPI($appID, $appSecret);
        //foeach values:
        //INIT FACBOOK API:
        if($fb){
             error_log('===-=====INITTEDĐ');
             foreach($streams as $stream){
                try {
                    // Returns a `FacebookFacebookResponse` object
                    $response = $fb->get(
                      '/'.$stream.'?fields=source',
                      $accees_token
                    );
                } catch(FacebookExceptionsFacebookResponseException $e) {
                    echo 'Graph returned an error: ' . $e->getMessage();
                    exit;
                } catch(FacebookExceptionsFacebookSDKException $e) {
                    echo 'Facebook SDK returned an error: ' . $e->getMessage();
                    exit;
                }
                $graphNode = $response->getGraphNode();
                $link = $this->getLinkStream($graphNode);
                if(!empty($link)){
                    array_push($links, $link);
                }
                error_log('---------->>>>>>>>> GRAPPPP:'.$link);
             }
        }else{
            error_log('CAN NOT INIT');
        }
        return $links;
    }

    public function initFaceBookAPI($appID, $appSecret){
        $fb = new \Facebook\Facebook([
            'app_id' => $appID,
            'app_secret' => $appSecret,
            'default_graph_version' => 'v2.10',
            //'default_access_token' => '{access-token}', // optional
        ]);

        return $fb;
    }

     //get videos stream 720 p:
     public function getLinkStream($response){
        preg_match_all("/\"source\":\"([^\"]+)/", $response, $matches);
        $arrays = $matches[1];
        $link = '';
         //foreach:
        if(!empty($arrays)){
           //forech get value array:
           foreach($arrays as $ar){
               $link = str_replace("\\","",$ar);
           }
        }
        return $link;
    }

    //get link stream:
    public function link(Request $request, $serverId){
        $sec = new Glo;
        if($request->ajax()){
           error_log('++++++++++++++++++++ FROM AJAX: '.$serverId);
           //save session:
           $sec->globalid = $serverId;
           session(['serverId' => $sec]);
           return 'OK'.$serverId;
        }
        else{
            // NOTING
        }
    }
}
