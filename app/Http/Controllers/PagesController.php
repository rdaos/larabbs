<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Category;
use App\Models\User;
use App\Models\Link;

class PagesController extends Controller
{
    public function root(Request $request, Topic $topic, User $user, Link $link)
    {
        $notices = $topic->query()->where('category_id', 4)->paginate(5);
        $hots = $topic->withOrder('view')->paginate(5);
        $news = $topic->paginate(10);
        $active_users = $user->getActiveUsers();
        $links = $link->getAllCached();

        return view('pages.root', compact('notices', 'hots', 'news', 'active_users', 'links'));
    }

    public function search(Request $request, Topic $topic)
    {
        $q = $request->q;
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $topics = $topic->withOrder($request->order)
            ->where('title', 'like', '%' . $q . '%')
            ->paginate(20);

        return view('pages.search', compact('topics', 'q'));
    }

    public function permissionDenied()
    {
        // 如果当前用户有权限访问后台，直接跳转访问
        if (config('administrator.permission')()) {
            return redirect(url(config('administrator.uri')), 302);
        }
        // 否则使用视图
        return view('pages.permission_denied');
    }
}