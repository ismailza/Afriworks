<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Http\Requests\ServiceRequest;
use App\Mail\admin\ContactMail as AdminContactMail;
use App\Mail\ContactMail as ClientContactMail;
use App\Mail\admin\ServiceRequestMail as AdminServiceRequestMail;
use App\Mail\ServiceRequestMail as ClientServiceRequestMail;
use App\Models\About;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\Project;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\WorkingProcessStep;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use TCG\Voyager\Models\Category;
use TCG\Voyager\Models\Post;

class HomeController extends Controller
{
    /**
     * Show the application home page.
     * @return View
     */
    public function index(): View
    {
        return view('index', [
            'banner' => Banner::first(),
            'about' => About::first(),
            'services' => Service::published()->recent()->limit(6)->get(),
            'projects' => Project::published()->recent()->limit(6)->get(),
            'teamMembers' => TeamMember::all(),
            'testimonials' => Testimonial::Active()->orderBy('created_at', 'desc')->get(),
            'posts' => Post::published()->orderBy('created_at', 'desc')->limit(6)->get(),
            'counter' => [
                'servicesCount' => Service::count(),
                'projectsCount' => Project::count(),
                'teamMembersCount' => TeamMember::count(),
                'testimonialsCount' => Testimonial::count(),
            ]
        ]);
    }

    /**
     * Show the application about page.
     * @return View
     */
    public function about(): View
    {
        return view('about', [
            'about' => About::first(),
            'workingProcessSteps' => WorkingProcessStep::orderBy('step_number')->get(),
            'teamMembers' => TeamMember::all(),
            'testimonials' => Testimonial::Active()->orderBy('created_at', 'desc')->get(),
            'counter' => [
                'servicesCount' => Service::count(),
                'projectsCount' => Project::count(),
                'teamMembersCount' => TeamMember::count(),
                'testimonialsCount' => Testimonial::count(),
            ]
        ]);
    }

    /**
     * Show the services page.
     * @return View
     */
    public function services(): View
    {
        return view('services.index', [
            'services' => Service::published()->recent()->get(),
        ]);
    }

    /**
     * Show the service details page.
     * @param Service $service
     * @return View
     */
    public function showService(Service $service): View
    {
        return view('services.show', [
            'service' => $service,
        ]);
    }

    /**
     * Store service request
     * @param ServiceRequest $request
     * @return RedirectResponse
     */
    public function storeServiceRequest(ServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();
        // Store the service request
        $service = Service::findOrFail($data['service_id']);
        $data['status'] = 'pending';
        $serviceRequest = $service->requests()->create($data);
        // Send notification email
        Mail::send(new AdminServiceRequestMail($serviceRequest, $service));
        Mail::send(new ClientServiceRequestMail($serviceRequest, $service));
        // Back with success message
        sweetalert('Votre demande de service a été envoyée avec succès. Nous vous contacterons bientôt. Merci.');
        return back();
    }

    /**
     * Show the projects page.
     * @return View
     */
    public function projects(): View
    {
        return view('projects.index', [
            'projects' => Project::published()->recent()->paginate(3),
            'services' => Service::all(),
            'recentProjects' => Project::published()->recent()->limit(6)->get(),
        ]);
    }

    /**
     * Show the project details page.
     * @param Project $project
     * @return View
     */
    public function showProject(Project $project): View
    {
        return view('projects.show', [
            'project' => $project,
        ]);
    }

    /**
     * Show the blogs page.
     * @return View
     */
    public function blogs(): View
    {
        return view('blogs.index', [
            'posts' => Post::published()->orderBy('created_at', 'desc')->paginate(3),
            'categories' => Category::all(),
            'recentProjects' => Project::published()->recent()->limit(6)->get(),
        ]);
    }

    public function showBlog(Post $post): View
    {
        return view('blogs.show', [
            'post' => $post,
            'recentPosts' => Post::published()->orderBy('created_at', 'desc')->limit(6)->get(),
            'postTags' => $post->meta_keywords ? explode(',', $post->meta_keywords) : [],
            'recentProjects' => Project::published()->recent()->limit(6)->get(),
        ]);
    }

    /**
     * Show the contact page.
     * @return View
     */
    public function contact(): View
    {
        return view('contact');
    }

    /**
     * Save contact form and sending notification emails
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function storeContact(ContactRequest $request): RedirectResponse
    {
        $data = $request->validated();
        // Store the contact form data
        $data['status'] = 'new';
        $contact = new Contact();
        $contact->fill($data);
        $contact->save();
        // Send notification emails
        Mail::send(new AdminContactMail($contact));
        Mail::send(new ClientContactMail($contact));
        // Back with success message
        sweetalert('Votre message a été envoyée avec succès. Nous vous contacterons bientôt. Merci.');
        return back();
    }
}
