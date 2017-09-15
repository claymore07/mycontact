<?php

namespace App\Http\Controllers;

use App\Contacts;
use App\Groups;
use App\User;
use App\Http\Requests\ContactsRequest;
use Auth;
use File;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        // the bad way
        // $user_id = $request->user()->id;
        $user_id =Auth::user()->id;

        //
        /*if($groupId = ($request->get('group_id'))){
                $contacts = Contacts::orderBy('id','desc')->whereGroupId($groupId)->paginate(4);
        }else{
            $contacts = Contacts::orderBy('id','desc')->paginate(5);
        }*/
        $contacts = Contacts::where(function($query) use ($request, $user_id) {
            if( ($term = $request->get("term")) ) {
                $keywords = '%' . $term . '%';
                $query->orWhere("name", 'LIKE', $keywords);
                $query->orWhere("company", 'LIKE', $keywords);
                $query->orWhere("email", 'LIKE', $keywords);
            }

            if ($groupId = ($request->get('group_id'))) {
                $query->where('group_id', $groupId);
            }
        })
            ->where("user_id", $user_id)
            ->orderBy('id', 'desc')
            ->paginate(4);

        return view('contacts.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $groups = Groups::pluck('name','id')->all();

        return view('contacts.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactsRequest $request)
    {
        //

        $input = $request->all();

        if($photo = $request->file('photo')) {
            $path = public_path() . '/images';
            $fileName= time().$photo->getClientOriginalName();
            $photo->move($path, $fileName);
            $input['photo']=$fileName;

            //or other way to save user_id
            Auth::user()->contacts()->create($input);
        }else{
            Auth::user()->contacts()->create($input);
        }

        return redirect('/contacts/')->with('message','موفق');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $groups = Groups::pluck('name','id')->all();
        $contact=Contacts::findOrFail($id);


        $this->authorize('modify', $contact);
        return view('contacts.edit', compact('contact','groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContactsRequest $request, $id)
    {
        //
        $contact =  Contacts::findOrFail($id);
        $this->authorize('modify', $contact);
        $input = $request->all();

        if($photo = $request->file('photo')) {
            $path = public_path() . '/images';
            $fileName= time().$photo->getClientOriginalName();
            $photo->move($path, $fileName);
            $input['photo']=$fileName;
            if($contact->photo != null){

                if (File::exists($path .'/'. $contact->photo)) {
                    unlink($path.'/' . $contact->photo);
                }
            }
            $contact->update($input);
        }else{
            $contact->update($input);
        }



        return redirect('/contacts/')->with('message','بروزرسانی شد');
    }
    public function autoComplete(Request $request){
        if($request->ajax()){
            return Contacts::select(['id','name as value'])->where(function($query) use ($request){

                if(($term = $request->get('term'))){

                    $keywords = '%'.$term.'%';
                    $query->orWhere("name",'LIKE',$keywords);
                    $query->orWhere("email",'LIKE',$keywords);
                    $query->orWhere("company",'LIKE',$keywords);
                }
            })->orderBy('name','asc')->take(5)->get();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $contact =  Contacts::findOrFail($id);
        $this->authorize('modify', $contact);

        if($contact->photo != null){

            if (File::exists(public_path() . '/images/'. $contact->photo)) {

                unlink(public_path() . '/images/'. $contact->photo);
            }
        }
        $contact->delete();
        return redirect('/contacts')->with('message','حذف شد!');
    }
}
