<?php
namespace App\Http\Controllers\ACs;
use App\AdminModels\Newsevent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
/*use Cartalyst\Stripe\Stripe;*/
class NewsEvents extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
		$this->middleware('auth');
    }
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function create()
    {
        return view('admin.createEvent');
    }
	
	/**
    * Edit the record
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function edit($id)
    {
		$newsevent = NewsEvent::findOrFail($id);
		echo "<pre>";
		print_r($newsevent);
		die();
        return view('admin.editEvent', compact('newsevent'));
    }
	
	/**
    * Edit the record
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function update(Request $request, $id)
    {
		if(!empty($id) && $id > 0)
		{
			/* Validate data before saving. */
			$this->validate($request, NewsEvents::rules(), NewsEvents::messages());
			/* update now. */
			$newsevents = NewsEvent::find($id);
			$newsevents->ne_title = $request->ne_title;
			$newsevents->ne_content = $request->ne_content;
			$newsevents->save();
			return redirect()->route('listallnewsevents')->with('alert-success', 'Record updated saved successfully.');
		}
		return redirect()->route('listallnewsevents')->with('alert-error', 'There was an issue.');
    }
	
	/*
	* Show the list of added news & events.
	*/
	public function save(Request $request)
    {
		/* Validate data before saving. */
		$this->validate($request, NewsEvents::rules(), NewsEvents::messages());
		$file_name_to_save_in_db = "";
		if($request->hasfile('ne_image'))
		{
			$file_to_be_uploaded = $request->file('ne_image');
            // Get filename with extension
            $filenameWithExt = $file_to_be_uploaded->getClientOriginalName();
			/* file name. */
            $file_name_to_save_in_db = time().'_'.$filenameWithExt;
			/* It will store files in storage/app/images/ folder. */
			$path = $file_to_be_uploaded->storeAs('/images/', $file_name_to_save_in_db, 'local');
        }
		
		/* Save now. */
		$newsevents = new NewsEvent;
		$newsevents->ne_title = $request->ne_title;
		$newsevents->ne_content = $request->ne_content;
		$newsevents->ne_image = $file_name_to_save_in_db;
		$newsevents->save();
		return redirect()->route('listallnewsevents')->with('alert-success', 'The record was saved successfully');
	}
	
	public static function rules($id = '') {
		return [
			'ne_title'	=>	'required|max:50',
            'ne_content'=>	'required|max:5000',
			'ne_image'	=>	'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
		];
	}
	
	/**
	 * Get the error messages for the defined validation rules.
	 *
	 * @return array
	 */
	public static function messages()
	{
		return [
			'ne_title.required' => 'News/Event title is required.',
			'ne_content.required'  => 'News/Event content is required.',
			'ne_title.max' => 'Title must be less than equal to 50 characters.',
		];
	}
	
	/*
	* Show the list of added news & events.
	*/
	public function listall()
    {
		/* Get data from stripe. */
		
		/*$stripe = new Stripe();
		$charges = $stripe->customers()->all();
		echo "<pre>";
		print_r($charges);
		die();*/
		
		$all_records = NewsEvent::all();
		return view('admin.listEvent')->with("all_records", $all_records);
    }
	/* Delete record. */
	public function delete(Request $request)
    {
		if(isset($request->rid) && intval($request->rid) > 0)
		{
			$record_id = $request->rid;
			
			$newsevent = NewsEvent::find($record_id);
			$newsevent->delete($newsevent->id);
			echo json_encode(array("resp" => "Record has been deleted successfully!"));
		}
		
    }
}