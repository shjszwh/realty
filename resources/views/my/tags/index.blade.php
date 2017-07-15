@extends('layouts.my')

@section('title', '我的文章')

@section('content')
    <el-row>
        <el-col  :span="24">
            <el-card class="box-card">
                <div class="text item">
                    <el-tag type="primary" class="realty-links-tag" v-for="(item,index) in tags" :key="index">
                        <a :href="item.url">
                            @{{item.title}}
                            <span v-if="item.number>1">(@{{ item.number  }})</span>
                        </a>
                    </el-tag>
                </div>
            </el-card>
        </el-col>
    </el-row>
@endsection

@section('js')
    <script>
        var items = {!! $tags !!};
    </script>
    <script src="{{  mix('js/my.tags.index.js')  }}"></script>
@endsection

@section('css')

@endsection
