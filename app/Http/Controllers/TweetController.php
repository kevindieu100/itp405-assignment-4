<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

class TweetController extends Controller
{
    //displays the index page with form and tweet timeline
    public function index()
	{
		$tweets = DB::table('tweets')
			->select('id', 'tweet')
			->orderBy('id', 'desc')
			->get();

		return view('twitter.index', [
			'tweets' => $tweets
		]);
	}//end of index

	//stores a new tweet while also validating it
	public function store(Request $request)
	{
		$validation = Validator::make( $request->all(), 
		[
			'newTweet' => 'required|max:140'
		]);

		if($validation->passes())
		{
			//code if validation passes, adds to tweets table
			DB::table('tweets')->insert([
				'tweet' => request('newTweet')
			]);

			return redirect('/')
				->with('successStatus', 'Tweet successfully created!');
		}
		else
		{
			//code if the validation fails
			return redirect('/')
				->withErrors($validation);
		}
	}//end of store

	//deletes a tweet if user clicks on 'X'
	public function destroy($tweetID)
	{
		DB::table('tweets')
			->where('id', '=', $tweetID)
			->delete();

		return redirect('/')
			->with('successStatus', 'Tweet successfully deleted!');
	}//end of destroy

	//redirects to show a singular tweet
	public function view($tweetID)
	{
		$tweet = DB::table('tweets')
			->where('id', '=', $tweetID)
			->get();

		return view('twitter.view', [
			'tweet' => $tweet
		]);
	}//end of view
}
