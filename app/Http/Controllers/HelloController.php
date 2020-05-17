<?php

namespace App\Http\Controllers;

use App\Events\PersonEvent;
use App\Jobs\MyJob;
use App\MyClasses\PowerMyService;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Symfony\Component\Console\Output\BufferedOutput;

class HelloController extends Controller
{
    public function __construct()
    {
    }

    public function index(Request $request, $id = -1)
    {
        $opt = [
            '--method' => 'get',
            '--path' => 'hello',
            '--sort' => 'uri',
            '--compact' => null
        ];
        $output = new BufferedOutput;
        Artisan::call('route:list', $opt, $output);
        $msg = $output->fetch();

        return view(
            'hello.index',
            $this->getInitData($msg, $request->sort)
        );
    }

    public function send(Request $request)
    {
        $id = $request->input('id');
        $person = Person::find($id);
        event(new PersonEvent($person));
        return view(
            'hello.index',
            $this->getInitData(
                "id={$id}",
                $request->query('sort'),
                [$person]
            )
        );
    }

    public function other()
    {
        $person = new Person();
        $person->all_data = ['aaa', 'bbb@ccc', 1234];
        $person->save();
        return redirect()->route('hello');
    }
   
    public function movePage(Request $request)
    {
        return [
            'partialView' => View::make(
                'components.hello_table',
                $this->getDetailData($request->sort)
            )->render()
        ];
    }
    
    protected function getInitData($msg, $sort = null, $data = [])
    {
        return array_merge(
            ['user' => Auth::user(), 'msg' => $msg, 'data' => $data],
            $this->getDetailData($sort)
        );
    }

    protected function getDetailData($sort)
    {
        $items = Person::orderBy($sort ?? 'id', 'asc')->paginate(5);
        return ['items' => $items, 'sort' => $sort];
    }

    public function post(Request $request)
    {
        $validate_rule = [
            'msg' => 'required'
        ];
        $this->validate($request, $validate_rule);
        
        $msg = $request->msg;
        $response = response()->view(
            'hello.index',
            ['msg'=> '「' . $msg . '」をクッキーに保存しました。']
        );
        $response->cookie('msg', $msg, 100);
        return $response;
    }

    public function add(Request $request)
    {
        return view('hello.add');
    }

    public function create(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age
        ];
        DB::table('people')->insert($param);
        return redirect('/hello');
    }

    public function edit(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.edit', ['form' => $item[0]]);
    }

    public function update(Request $request)
    {
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age
        ];
        DB::table('people')->where('id', $request->id)->update($param);
        return redirect('/hello');
    }

    public function del(Request $request)
    {
        $param = ['id' => $request->id];
        $item = DB::select('select * from people where id = :id', $param);
        return view('hello.del', ['form' => $item[0]]);
    }

    public function remove(Request $request)
    {
        DB::table('people')->where('id', $request->id)->delete();
        return redirect('/hello');
    }

    public function show(Request $request)
    {
        $page = $request->page;
        $items = DB::table('people')->offset($page * 3)->limit(3)->get();
        return view('hello.show', ['items' => $items]);
    }

    public function rest(Request $request)
    {
        return view('hello.rest');
    }

    public function ses_get(Request $request)
    {
        $sesdata = $request->session()->get('msg');
        return view('hello.session', ['session_data' => $sesdata]);
    }

    public function ses_put(Request $request)
    {
        $sesdata = $request->session()->put('msg', $request->input);
        return redirect('hello/session');
    }

    public function getAuth(Request $request)
    {
        $param = ['message' => 'ログインして下さい。'];
        return view('hello.auth', $param);
    }

    public function postAuth(Request $request)
    {
        if (Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
            $msg = 'ログインしました。(' . Auth::user()->name . ')';
        } else {
            $msg = 'ログインに失敗しました。';
        }
        return view('hello.auth', ['message' => $msg]);
    }

    public function save($id, $name)
    {
        $record = Person::find($id);
        $record->name = $name;
        $record->save();
        return redirect()->route('hello');
    }

    public function json($id = -1)
    {
        if ($id == -1) {
            return Person::get()->toJson();
        } else {
            $person = Person::find($id);
            if ($person == null) {
                return [];
            } else {
                return $person->toJson();
            }
        }
    }

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('event:clear');
        return redirect()->route('hello');
    }
}
