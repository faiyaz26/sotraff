<?php

use Illuminate\Support\Facades\URL; # not sure why i need this here :c
use Robbo\Presenter\PresentableInterface;
use LaravelBook\Ardent\Ardent;

class Post extends Ardent implements PresentableInterface {

	/**
	 * Deletes a blog post and all
	 * the associated comments.
	 *
	 * @return bool
	 */

	public static $rules = array(
		'jam_value' => 'required',
		'place_id' =>  'required',
	);

	public function delete()
	{
		// Delete the blog post
		return parent::delete();
	}

	/**
	 * Get the post's author.
	 *
	 * @return User
	 */
	public function author()
	{
		return $this->belongsTo('User', 'user_id');
	}

	/**
	 * Get the post's comments.
	 *
	 * @return array
	 */

    /**
     * Get the date the post was created.
     *
     * @param \Carbon|null $date
     * @return string
     */
    public function date($date=null)
    {
        if(is_null($date)) {
            $date = $this->created_at;
        }

        return String::date($date);
    }

	/**
	 * Returns the date of the blog post creation,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function created_at()
	{
		return $this->date($this->created_at);
	}

	/**
	 * Returns the date of the blog post last update,
	 * on a good and more readable format :)
	 *
	 * @return string
	 */
	public function updated_at()
	{
        return $this->date($this->updated_at);
	}

    public function getPresenter()
    {
        return new PostPresenter($this);
    }

}
