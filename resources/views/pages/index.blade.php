@extends('layouts.default')
@section('title', '首页')
@section('content')
    <div class="row">
        home
    </div>
    <script>
        var result = [];
        for (var i = 0; i < 12; i++) {
            var d = new Date();
            d.setDate(1);
            d.setMonth(d.getMonth() - i);
            var m = d.getMonth() + 1;
            m = m < 10 ? "0" + m : m;
            //在这里可以自定义输出的日期格式
            result.push(d.getFullYear() + "-" + m);
            //result.push(d.getFullYear() + "年" + m + '月');
        }
        console.log(result.reverse())
        var arr =  ["2019-05", "2019-06", "2019-07", "2019-08", "2019-09", "2019-10", "2019-11", "2019-12", "2020-01", "2020-02", "2020-03", "2020-04"]
        var res = [{date:'2019-05',data:'1'},{date:'2019-07', data:'2'}]
        var data=[]
        for (var i=0;i<12;i++) {
            res.map(function (item) {
                if(item.date==arr[i]){
                    data[i] = item.data;
                }
            })
            !!data[i] || (data[i] = !!data[i-1]? data[i-1]:0)
        }
        console.log(data);

    </script>
@endsection
