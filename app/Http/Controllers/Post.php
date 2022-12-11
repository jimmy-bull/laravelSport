<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use App\Models\ImageVideoTable;
use App\Models\PostTable;
use App\Models\FollowingSystem;
use App\Models\like;
use Illuminate\Support\Facades\Storage;
use App\Models\sub_comments_table;

class Post extends Controller
{
    public function add_post(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $id = User::where('remember_token', "=", $request->token)->value("id");
            $post = new PostTable();
            $post->title = $request->title;
            $post->user_id = $id;
            $post->who_can_see = $request->who_can_see;
            $post->status = $request->status;
            $post->save();
            foreach ($request->file('images') as $key => $file) {
                if (
                    $file->extension() == "mp4" || $file->extension() == "flv" ||
                    $file->extension() == "m3u8" || $file->extension() == "ts" || $file->extension() == "3gp"
                    || $file->extension() == "mov" || $file->extension() == "avi" || $file->extension() == "wmv"
                ) {
                    $image_tables = new  ImageVideoTable();
                    $image_tables->post_id = $post->id;
                    $image_tables->type = "video";
                    $image_tables->link = $file->store('public/post_images_videos');
                    $image_tables->save();
                } else {
                    $image_tables = new  ImageVideoTable();
                    $image_tables->post_id = $post->id;
                    $image_tables->type = "image";
                    $image_tables->link = $file->store('public/post_images_videos');
                    $image_tables->save();
                }
            }
            return json_encode('good');

            // $team->logo = $request->file('logo')->store('public/teams_photos');
            // $team->cover = $request->file('cover')->store('public/teams_photos');
            // $team->city = $request->city;
            // return $request->file;
            // return $post->id;
            // status = online,deleted,
        }
        return json_encode('Vous devez vous reconnecter.');
    }

    public function getPost(Request $request)
    {
        $newTable = [];
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            if ($request->who == "me") {
                $user_id = User::where('remember_token', "=", $request->token)->select('id')->get();
            } else {
                $user_id = User::where('email', "=", $request->who)->select('id')->get();
            }

            $i = 0;
            $fromDB =  PostTable::join('image_video_tables', "post_tables.id", "=", "image_video_tables.post_id")
                ->join('users', "post_tables.user_id", "=", "users.id")
                ->join('users__profile__photos', "users__profile__photos.email", "=", "users.email")
                ->where('post_tables.user_id', "=",  $user_id[0]->id)->get()->groupBy("post_id");
            foreach ($fromDB as $key => $value) {
                $images = [];
                $customObj = new \stdClass();
                $customObj->id = $key;
                $countLikes =  like::where('post_id', "=", $key)->count();
                $customObj->likes = $countLikes;
                $countComments =  Comment::where('post_id', "=", $key)->count();
                $customObj->comments = $countComments;
                $commentsDate = PostTable::where('id', "=", $key)->select("created_at")->get();
                $customObj->date = $commentsDate[0]->created_at;
                $meLikes =  like::where('post_id', "=", $key)->where('who_liked_id', "=", $user_id[0]->id)->count();
                if ($meLikes > 0) {
                    $customObj->meLikes = true;
                } else {
                    $customObj->meLikes = false;
                }

                foreach ($fromDB[$key] as $key__ => $value__) {
                    $imagesObj = new \stdClass();
                    $imagesObj->image = $value__->link;
                    $imagesObj->id = $i;
                    if (Storage::disk('public')->exists(explode("public", $value__->link)[1])) {
                        $img_size = getimagesize(storage_path('app/' . $value__->link));
                    } else {
                        $img_size = false;
                    }
                    if ($img_size != false) {
                        $imagesObj->imageDimension = intval($img_size["0"])  / intval($img_size["1"]);
                    } else {
                        $imagesObj->imageDimension = false;
                    }
                    array_push($images, $imagesObj);
                    $customObj->images = $images;
                    $customObj->description = $value__->title;
                    $customObj->postType = "regular";
                    $customObj->city = $value__->city;
                    $customObj->country = $value__->country;
                    $customObj->posterName = $value__->lastname . " " . $value__->name;
                    $customObj->posterImage = $value__->image;
                    $i++;
                }
                $i = 0;
                array_push($newTable, $customObj);
            }
            return   $newTable;
        }
    }

    public function getPostONfield(Request $request)
    {
        $newTable = [];
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            //REcupere les post de ceux que je suis sur l'application
            $user_id = User::where('remember_token', "=", $request->token)->select('id')->get();
            $email = User::where('remember_token', "=", $request->token)->select('email')->get();
            $fromDB =  PostTable::join('image_video_tables', "post_tables.id", "=", "image_video_tables.post_id")
                ->join('users', "post_tables.user_id", "=", "users.id")
                ->join('users__profile__photos', "users__profile__photos.email", "=", "users.email")
                ->join('following_systems', "users.email", "=", "following_systems.thefollowed")
                ->where('thefollower', "=",  $email[0]->email)
                ->where('thefollowingState', "=", "isfollowing")
                ->get()->groupBy("post_id");
            //  return  $fromDB;
            $i = 0;
            foreach ($fromDB as $key => $value) {
                $images = [];
                $customObj = new \stdClass();
                $customObj->id = $key;

                $countLikes =  like::where('post_id', "=", $key)->count();
                $customObj->likes = $countLikes;
                $countComments =  Comment::where('post_id', "=", $key)->count();
                $customObj->comments = $countComments;
                $commentsDate = PostTable::where('id', "=", $key)->select("created_at")->get();
                $customObj->date = $commentsDate[0]->created_at;

                $meLikes =  like::where('post_id', "=", $key)->where('who_liked_id', "=", $user_id[0]->id)->count();
                if ($meLikes > 0) {
                    $customObj->meLikes = true;
                } else {
                    $customObj->meLikes = false;
                }

                foreach ($fromDB[$key] as $key__ => $value__) {
                    $imagesObj = new \stdClass();
                    $imagesObj->image = $value__->link;
                    $imagesObj->id = $i;

                    if (Storage::disk('public')->exists(explode("public", $value__->link)[1])) {
                        $img_size = getimagesize(storage_path('app/' . $value__->link));
                    } else {
                        $img_size = false;
                    }

                    if ($img_size != false) {
                        $imagesObj->imageDimension = intval($img_size["0"])  / intval($img_size["1"]);
                    } else {
                        $imagesObj->imageDimension = false;
                    }
                    array_push($images, $imagesObj);
                    $customObj->images = $images;
                    $customObj->description = $value__->title;
                    $customObj->postType = "regular";
                    $customObj->city = $value__->city;
                    $customObj->country = $value__->country;
                    $customObj->posterName = $value__->lastname . " " . $value__->name;
                    $customObj->posterImage = $value__->image;

                    $i++;
                }
                $i = 0;
                array_push($newTable, $customObj);
            }
            return   $newTable;
        }
    }

    public function addLikes(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $user_id = User::where('remember_token', "=", $request->token)->select('id')->get();
            $checklikes =  like::where('who_liked_id', "=", $user_id[0]->id)->where('post_id', "=", $request->post_id)->count();
            if ($checklikes  > 0) {
                like::where('who_liked_id', "=", $user_id[0]->id)->where('post_id', "=", $request->post_id)->delete();
                echo "vous venez de dislikez ce post";
            } else {
                $likes = new like();
                $likes->post_id =  $request->post_id;
                $likes->who_liked_id =  $user_id[0]->id;
                $likes->save();
                echo "vous venez de likez ce post";
            }
        }
    }

    public function addComments(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $user_id = User::where('remember_token', "=", $request->token)->select('id')->get();
            $comments = new Comment();
            $comments->post_id =  $request->post_id;
            $comments->comment =  $request->comment;
            $comments->who_commented_id =  $user_id[0]->id;
            $comments->save();
            return "good";
        } else {
            return "not connected";
        }
    }

    public function addSubComments(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            // if ($request->position == 'first') {
            $user_id = User::where('remember_token', "=", $request->token)->select('id')->get();
            $subcomments = new sub_comments_table();
            $subcomments->comments = $request->comment;
            $subcomments->who_commented_id = $user_id[0]->id;
            $subcomments->main_comment_id = $request->main_comment_id;
            $subcomments->comment_id = 0;
            $subcomments->save();
            // sub_comments_table::where('id', "=", $subcomments->id)->update(["comment_id" => $subcomments->id]);
            // }
            return 'good';
        } else {
            return "not connected";
        }
    }

    public function addSubComments_sub(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $user_id = User::where('remember_token', "=", $request->token)->select('id')->get();
            $subcomments = new sub_comments_table();
            $subcomments->comments = $request->comment;
            $subcomments->who_commented_id = $user_id[0]->id;
            $subcomments->main_comment_id = $request->main_comment_id;
            $subcomments->comment_id = $request->comment_id;
            $subcomments->save();
        } else {
            return "not connected";
        }
    }

    public function getComments(Request $request)
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $getMainComments =  Comment::join('users', "users.id", "=", "comments.who_commented_id")
                ->join('users__profile__photos', "users__profile__photos.email", "=", "users.email")
                ->where('post_id', "=", $request->post_id)->select(["comment", "image", "post_id", "comments.created_at", "users.name", "users.lastname", "comments.id"])->get();

            $newTable = [];
            foreach ($getMainComments  as $key => $value) {
                $count = sub_comments_table::where('main_comment_id', '=', $value->id)->count();
                $customObj = new \stdClass();
                $customObj->totalSubComment = $count;
                $customObj->comment =  $value->comment;
                $customObj->image =  $value->image;
                $customObj->post_id =  $value->post_id;
                $customObj->created_at =  $value->created_at;
                $customObj->name =  $value->name;
                $customObj->lastname =  $value->lastname;
                $customObj->id =  $value->id;
                array_push($newTable, $customObj);
            }
            return  $newTable;
        } else {
            return "not connected";
        }
    }

    public function loadSubComments(Request $request) // Load first subComments of main comments
    {
        $checkfirst =  User::where('remember_token', "=", $request->token)->count();
        if ($checkfirst > 0) {
            $comments =  sub_comments_table::join('users', "users.id", "=", "sub_comments_tables.who_commented_id")
                ->join('users__profile__photos', "users__profile__photos.email", "=", "users.email")
                // ->whereRaw('comment_id = 0')
                ->where('main_comment_id', "=", $request->main_comment_id)->select(["comments", "image",  "sub_comments_tables.created_at", "users.name", "users.lastname", "sub_comments_tables.id"])->get();
            $newTable = [];
            foreach ($comments  as $key => $value) {
                $count = sub_comments_table::where('comment_id', '=', $value->id)->count();
                $customObj = new \stdClass();
                $customObj->totalSubComment = $count;
                $customObj->comment =  $value->comments;
                $customObj->image =  $value->image;
                // $customObj->post_id =  $value->post_id;
                $customObj->created_at =  $value->created_at;
                $customObj->name =  $value->name;
                $customObj->lastname =  $value->lastname;
                $customObj->id =  $value->id;
                array_push($newTable, $customObj);
            }
            return  $newTable;
        } else {
            return "not connected";
        }
    }

    public function loadSubComments_sub(Request $request) // Load first subComments of main comments
    {
        $comments =  sub_comments_table::join('users', "users.id", "=", "sub_comments_tables.who_commented_id")
            ->join('users__profile__photos', "users__profile__photos.email", "=", "users.email")
            ->where('comment_id', "=", $request->comment_id)->select(["comments", "image",  "sub_comments_tables.created_at", "users.name", "users.lastname", "sub_comments_tables.id"])->get();

        $newTable = [];
        foreach ($comments  as $key => $value) {
            $count = sub_comments_table::where('comment_id', '=', $value->id)->count();
            $customObj = new \stdClass();
            $customObj->totalSubComment = $count;
            $customObj->comment =  $value->comments;
            $customObj->image =  $value->image;
            // $customObj->post_id =  $value->post_id;
            $customObj->created_at =  $value->created_at;
            $customObj->name =  $value->name;
            $customObj->lastname =  $value->lastname;
            $customObj->id =  $value->id;
            array_push($newTable, $customObj);
        }
        return  $newTable;
    }
}
