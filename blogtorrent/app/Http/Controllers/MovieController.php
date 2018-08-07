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
        $passAES = 'phimtorrent';
        $api = 'http://banhtv.net/api/getlink.php?url=';
        $movie = Inventory::where('slug',$slug)->first();
        $key = $movie->slug;
        $encript = GibberishAES::enc($key,$passAES);
        error_log('+++++++++ EN SCRIPT:  '.$encript);
        error_log('ENCRIPT LENGHT: '.strlen($encript));
        error_log('------------------->DE SLUG:  '.GibberishAES::dec($encript,$passAES));
        $pass =  'phimbathu.com'.'4590481877';
        $decodes = [];
        $stream1 = $this->getVideosStream2($this->curl($api.$movie->stream2));
        if(!empty($stream1)){
            array_push($decodes,$stream1);
        }
        //get movie:
        if(!empty($movie)){
            $streamLink = $movie->stream;
            $curl = $this->curl($streamLink);
            $id = $this->getIdMovie($curl);
            $links = $this->getVideosStream($curl);
            //check decode:
            if(!empty($links)){
                foreach($links as $link){
                    error_log('=== DECODE===');
                    $decode = GibberishAES::dec($link, $pass.$id);
                    if(!empty($decode)){
                        array_push($decodes,$decode);
                    }
                }
            }
        }

        //set session links:
        session(['links' => $decodes]);

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

        //check link:
        if(!empty($decodes)){
            $test = $this->curl($api.$movie->stream2);
            return view('watch')->with(array('movie'=>$movie,'links'=>$decodes,'category'=>$category->name,'global'=>$global->name,'test'=>$test, 'encript'=>$encript, 'serverId'=>$serverId, 'mosts'=>$mosts, 'currentDay'=>$currentDay));
        }
        else{
            return "<script>alert('Link xem chưa được cập nhật!');history.back(-2)'</script>";
        }
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
    
    //api get content movie:
    public function getUrl($slug, Request $request){
        //get links stream:
        $links = session('links');
        //set slug:
        $sec = session('serverId');
        $serverId = 0;
		if(!empty($sec)){
			$serverId = $sec->globalid;
        }
        
        if(!empty($links)){
            $pass = 'phimtorrent';
            $url = $_GET['url'];
            error_log('========> UR L'.$url);
            error_log('{{{{{{{ INDEX: '.$serverId);
            $api = 'http://banhtv.net/api/getlink.php?url=';
            $decript = GibberishAES::dec($url, $pass);
            error_log('????????????????? ENCRIPT: '.$decript);
            $movie = Inventory::where('slug',$slug)->first();
            error_log(':::::::::::::::::::::LINK STREM:'.$links[$serverId]);
            return Redirect::to($links[$serverId]);
        }
        else{
            return 'Link stream no found!';
        }
    }

    //get videos stream 720 p:
    public function getVideosStream($curlString){
        preg_match_all("/\"file\":\"([^\"]+)(\",\"type\":\"mp4\",\"label\":\"720p\")+/", $curlString, $matches);
        $arrays = $matches[1];
        $links = [];
         //foreach:
        if(!empty($arrays)){
           //forech get value array:
           foreach($arrays as $ar){
               error_log('=======> REPLACE:'.str_replace("\\","",$ar));
               $replace = str_replace("\\","",$ar);
               if(!empty($replace)){
                   array_push($links,$replace);
               }
           }
        }
        return $links;
    }

    //get videos stream 720 p:
    public function getVideosStream2($curlString){
        preg_match_all("/\"file\":\"([^\"]+)/",$curlString, $matches);
        $arrays = $matches[1];
        $link = '';
         //foreach:
        if(!empty($arrays)){
           //forech get value array:
           foreach($arrays as $ar){
               error_log('=======> REPLACE:'.str_replace("\\","",$ar));
               $replace = str_replace("\\","",$ar);
               if(!empty($replace)){
                   if($this->checkFile($replace)){
                       $link = $replace;
                   }
               }
           }
        }
        return $link;
    }

    //check link
    public function checkFile($file){
        if (strpos($file, 'api.bilutv.com')) {
            return true;
        }
        return false;
    }

    //get ID movie:
    public function getIdMovie($curlString){
        preg_match_all("/\"modelId\":\"(\d+)\"+/", $curlString, $matches);
        $arrays = $matches[1];
        //parse array:
        if(!empty($arrays)){
           return $arrays[0];
        }

        return null;
    }

    //curl url:
    public function curl($url){
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");

        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');

        $headers = array();
        $headers[] = "Connection: keep-alive";
        $headers[] = "Cache-Control: max-age=0";
        $headers[] = "Upgrade-Insecure-Requests: 1";
        $headers[] = "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36";
        $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
        $headers[] = "Accept-Encoding: gzip, deflate";
        $headers[] = "Accept-Language: en-US,en;q=0.9";
        $headers[] = "Cookie: ADB3rdCookie1478681307=1; __cfduid=d7cc697b22eec47b7abaf77f7a799dc491532963271; proxy_s_sv=1532965073811; ADB3rdCookie1478681307=1; __utma=247746630.713043224.1532963275.1532963275.1532963275.1; __utmc=247746630; __utmz=247746630.1532963275.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); __utmt=1; __utmt_b=1; CLIENT_IP6=; CLIENT_IPV6=; CLIENT_PROXY_OUT=; CLIENT_COUNTRY=VN; __RC=5; __R=3; __UF=-1; __tb=0; MarketGidStorage=%7B%220%22%3A%7B%22svspr%22%3A%22%22%2C%22svsds%22%3A3%2C%22TejndEEDj%22%3A%22JtnNLH.Id%22%7D%2C%22C108814%22%3A%7B%22page%22%3A3%2C%22time%22%3A1532963284735%7D%7D; lastview=1532963284; __uif=__uid%3A8332963275712118822%7C__create%3A1532963275; _ym_uid=1532963288614237774; _ym_d=1532963288; _ym_isad=2; __utmb=247746630.24.0.1532963290655";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close ($ch);

        return $result;
    }

    function get_real_url($url) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); 
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $html = curl_exec($ch);
        $url = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL );
        curl_close($ch);
    
        return $url;
    }
}
