<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestCollection;
use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use Result;

    /**
     * 获取用户数据
     * @param Request $request
     * @return TestCollection
     */
    public function index(Request $request)
    {
        //获取表中的所有数据,
        //all()与get（）区别，他们返回的结果相同， 添加查询条件时不可以使用all()
//       $data=Test::all();
        $pageSize = $request->input('pagesize', 2);
        $data = Test::Name()->Sex()->paginate($pageSize);


        //过滤表中的数据
//       $data=Test::where('age',177)->get();

        //链式约束
//       $data=Test::orderBy('created_at','desc')
//           ->take(3)
//           ->get();

        //聚合查询
//        $data=Test::avg('age');

//        return response()->json($data,200);

//        $data=Test::paginate(3);
        //引入资源集
        return new TestCollection($data);
    }

    public function show(Test $test)
    {
//        dd($test);
        return new \App\Http\Resources\Test($test);
    }

    public function destroy(Test $test)
    {
        if ($test->delete()) {
            return $this->success();
        } else {
            return $this->error();
        }

    }

    public function store(Request $request)
    {
        $data = $request->only('name', 'sex', 'age');
        if (Test::create($data)) {
            return $this->success();
        } else {
            $this->error();
        }
    }

    public function update(Request $request, Test $test)
    {
        $data = $request->only('name', 'sex', 'age');
        if (Test::where('id', $test->id)->update($data)) {
            return $this->success();
        } else {
            return $this->error();
        }
    }
}
