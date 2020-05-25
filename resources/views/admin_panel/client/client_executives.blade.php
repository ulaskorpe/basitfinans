<div class="x_title">
    <h2>{{__('general.admin_list')}}</h2>
    <div class="pull-right">
        <button type="button" class="btn btn-success" onclick="window.open('{{route('executive-create',$client['id'])}}','_self')">{{__('admin.create_executive')}}</button>
    </div>
    <div class="clearfix"></div>
</div>
<table id="datatable-fixed-header" class="table table-striped table-bordered">

    <thead>
    <tr>
        <th>{{__('general.image')}}</th>
        <th>{{__('admin.executive_name')}}</th>
        <th>{{__('general.contact')}}</th>
        <th>{{__('general.created_at')}}</th>
        <th>#</th>
    </tr>
    </thead>


    <tbody>
    @foreach($executives as $executive)
        <tr>
            <td> @if($executive['image'])

                    <img src="{{makeCommonFileUrl($executive['image'],64,64,1)}}" alt="" id="avatar_img">
                @else
                    <img src="" alt="" id="avatar_img" style="display: none">
                @endif</td>
            <td>{{$executive['name']}}</td>
            <td>{{$executive['email']}}
                @if($executive['phone'])
                    - {{$executive['phone']}}
                @endif
            </td>
            <td>{{\Carbon\Carbon::parse($executive['created_at'])->format('d.m.Y')}}</td>
            <td>
                <button type="button" class="btn btn-primary" onclick="window.open('{{route('executive-update',$executive['id'])}}','_self')">{{__('general.update')}}</button>
                <button type="button" class="btn btn-danger" onclick="deleteExecutive({{$executive['id']}})">{{__('general.delete')}}</button>

            </td>

        </tr>
    @endforeach
    </tbody>
</table>