<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

use App\Modules\Genre\Repositories\GenreInterface;
use App\Modules\Video\Repositories\VideoInterface;
use App\Modules\Blog\Repositories\BlogInterface;
use App\Modules\Subscriber\Repositories\SubscriberInterface;
use App\Modules\KhelauJuhari\Repositories\KhelauJuhariInterface;
use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\DynamicBlock\Repositories\BlockSectionInterface;
use App\Modules\Page\Repositories\PageInterface;
use App\Modules\FAQ\Repositories\FAQInterface;
use App\Modules\SearchLog\Repositories\SearchLogInterface;
use App\Modules\Subscription\Repositories\SubscriptionInterface;
use App\Modules\Video\Entities\Video;
use App\Modules\Ads\Repositories\AdsInterface;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    protected $searchLog;
    protected $video;
    protected $genre;
    protected $blog;
    protected $subscriber;
    protected $khelaujuhari;
    protected $banner;
    protected $blocksection;
    protected $faq;
    protected $subscription;
    protected $ads;

    public function __construct(VideoInterface $video, GenreInterface $genre, BlogInterface $blog, SubscriberInterface $subscriber, KhelauJuhariInterface $khelaujuhari, BannerInterface $banner, BlockSectionInterface $blocksection, PageInterface $page, FAQInterface $faq, SubscriptionInterface $subscription, SearchLogInterface $searchLog, AdsInterface $ads)
    {
        $this->video = $video;
        $this->searchLog = $searchLog;
        $this->genre = $genre;
        $this->blog = $blog;
        $this->subscriber = $subscriber;
        $this->khelaujuhari = $khelaujuhari;
        $this->banner = $banner;
        $this->blocksection = $blocksection;
        $this->page = $page;
        $this->faq = $faq;
        $this->subscription = $subscription;
        $this->ads = $ads;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $input = $request->all();

        $data['message'] = '';

        //Ads Section
        $data['Below_Banner']= $this->ads->getAdsByCategory('Below_Banner');
        $data['Below_Latest_Video']= $this->ads->getAdsByCategory('Below_Latest_Video');
        $data['Below_Trending_Video']= $this->ads->getAdsByCategory('Below_Trending_Video');
        $data['Below_Popular_Video']= $this->ads->getAdsByCategory('Below_Popular_Video');
        
         $data['latest_videos'] = $this->video->findAll($limit = 20);  
         $data['trending_videos'] = $this->video->getTrendingVideo($limit= 20);
         $data['popular_vidoes'] = $this->video->getPopularVideo($limit= 20);

        $data['dynamic_block'] = $this->blocksection->findAll($limit = 20);
        $data['blog_info'] = $this->blog->findAllActiveBlog($limit = 20);
        $data['banner_info'] = $this->banner->findAllActiveBanner($limit = 20);
        $data['genre'] = $this->genre->getList();

        if (array_key_exists('message', $input)) {
            $data['message'] = $input['message'];
        }
        return view('home::index', $data);
    }

    public function Videos(Request $request)
    {

        $search = $request->all();
        $data['message'] = '';
        $data['genre'] = $this->genre->getList();

        $data['videos'] = $this->video->findAll($limit = 25);

        if (array_key_exists('search_val', $search)) {
            $searchLog['keyword'] = $request->search_val;
            $searchLog['date'] = today();
            if (Auth::check()) {
                $searchLog['username'] = auth()->user()->username;
            }
            $this->searchLog->save($searchLog);

            $data['videos'] = $this->video->getSearchVideo($request->search_val);
        }

        if (array_key_exists('blockId', $search)) {
            $data['videos'] = $this->video->getAllBySection($request->blockId, $limit = 25);
            $block = $this->blocksection->find($request->blockId);
            $data['block_section_title'] = $block->block_section;
        } else {
            $data['block_section_title'] = '';
        }

        if (array_key_exists('genre', $search)) {
            $data['genre_search'] = $request->only('genre');
            $data['videos'] = $this->video->getByGenre($request->blockId, $request->genre, $limit = 25);
        } else {
            $data['genre_search'] = '';
        }
        return view('home::video-lists', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function VideoDetail(Request $request)
    {
        $input = $request->all();

        if (!array_key_exists('video_id', $input)) {
            alertify()->error('Video ID Missing');
            return redirect(route('home'));
        }

        $data['message'] = '';
        $video_id = $input['video_id'];



        $data['video_detail'] = $videoInfo = $this->video->find($video_id);

        $videoView = $videoInfo->total_views;
        $newCount = $videoView + 1;

        $video_data = array(
            'total_views' => $newCount,
            'date' => date('Y-m-d')
        );

        $this->video->update($video_id, $video_data);


        $data['Below_Video_Detail']= $this->ads->getAdsByCategory('Below_Video_Detail');
        $data['Above_Video_Detail']= $this->ads->getAdsByCategory('Above_Video_Detail');
        $data['Below_Trending_Video_Detail']= $this->ads->getAdsByCategory('Below_Trending_Video_Detail');
        $data['Below_Popular_Video_Detail']= $this->ads->getAdsByCategory('Below_Popular_Video_Detail');
        
        $data['trending_videos'] = $this->video->getTrendingVideo($limit= 20);
        $data['popular_vidoes'] = $this->video->getPopularVideo($limit= 20);

        return view('home::video-detail', $data);
    }

    public function Khelau(Request $request)
    {
        $data['message'] = '';
        // if (Auth::guard('subscriber')->check()) {
        $data['khelaujuhari_info'] = $this->khelaujuhari->findAll($limit = 50);
        return view('home::Khelau-juhari-lists', $data);
        // }else{
        //     alertify('Please SignIn To Access Khelau Juhari')->error();
        //    return redirect(route('home'));
        // }
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function KhelaujuhariDetail(Request $request)
    {
        $input = $request->all();
        $data['message'] = '';
        $juhari_id = $input['juhari_id'];

        $data['khelau_detail'] = $juhariInfo = $this->khelaujuhari->find($juhari_id);
        $data['related_videos'] = $this->khelaujuhari->findRelatedVideo($juhari_id);

        $videoView = $juhariInfo->total_views;
        $newCount = $videoView + 1;

        $juhari_data = array(
            'total_views' => $newCount
        );

        $this->khelaujuhari->update($juhari_id, $juhari_data);

        return view('home::khelau-juhari-detail', $data);
    }

    public function BlogDetail(Request $request)
    {

        $input = $request->all();
        $data['message'] = '';
        $blog_id = $input['blog_id'];

        $data['blog_detail'] = $this->blog->find($blog_id);
        $data['related_blog'] = $this->blog->findRelatedBlog($blog_id);

        $data['blog_id'] = $blog_id;

        return view('home::blog-detail', $data);
    }

    public function subscriberLogin()
    {
        $data['message'] = '';
        return view('home::subscriber-login', $data);
    }

    public function subscriberRegisterForm(Request $request)
    {
        $input = $request->all();
        $data['message'] = '';
        if (Auth::guard('subscriber')->check()) {
            return redirect(route('student-dashboard'));
        }

        $data['message'] = (array_key_exists('message', $input)) ? $input['message'] : false;

        return view('home::subscriber-register', $data);
    }

    public function subscriberRegister(Request $request)
    {

        $request->validate([
            'mobile_no' => 'required|numeric|digits:10',
            'email' => 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|confirmed|min:6'
        ]);

        $input = $request->all();

        $email = $input['email'];

        try {
            $subscriberData = array(
                'username' => $input['username'],
                'full_name' => $input['full_name'],
                'email' => $input['email'],
                'mobile_no' => $input['mobile_no'],
                'is_external_authenticate' => '0',
                'status' => '1',
                'email_verified' => '1',
                'user_type' => 'subscriber',
                'password' => bcrypt($input['password']),
                'registered_ip' => \Request::ip()
            );

            $subscriberInfo = $this->subscriber->save($subscriberData);

            alertify('You have registered Successfully.')->success();
        } catch (\Throwable $e) {
            alertify('Something Wrong With Message')->error();
        }

        return redirect(route('subscriber-login'));
    }

    public function subscriberAccount()
    {
    }

    public function myWishlist()
    {

        if (Auth::guard('subscriber')->check()) {
            $id = Auth::guard('subscriber')->user()->id;

            $data['wishlist_videos'] = $this->subscriber->getWishlistById($id);

            return view('home::video-mywishlist', $data);
        } else {
            alertify('Please Login Before Adding Wishlist.')->error();
            return redirect(route('subscriber-login'));
        }
    }


    public function aboutUs()
    {
        $data['about_manoranjan'] = $this->page->getBySlug('about_us');
        return view('home::aboutus', $data);
    }

    public function termUse()
    {
        $data['terms_use'] = $this->page->getBySlug('terms_of_use');
        return view('home::terms_use', $data);
    }

    public function privacyPolicy()
    {
        $data['policy'] = $this->page->getBySlug('privacy_policy');
        return view('home::privacy-policy', $data);
    }

    public function Faq()
    {

        $data['faq_detail'] = $this->faq->findAllActiveFAQ();
        return view('home::faq', $data);
    }

    public function subscriptionPackage()
    {

        $data['subscriptionInfo'] = $this->subscription->findAll();
        $data['subscription_payment'] = $this->subscription->findPayment();
        return view('home::subscription', $data);
    }
}
