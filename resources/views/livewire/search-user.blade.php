<div>
    <input wire:model="search" type="text" placeholder="Cari User.." class="form-control col-sm-3">

    <div class="table-responsive mt-2">
        <table class="table table-bordered table-hover">
           
            <thead>
                <tr>
                    <th>No</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $row)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$row->fullName}}</td>
                        <td>{{$row->username}}</td>
                        <td>{{$row->email}}</td>
                        <td class="text-center">
                            <button class="btn btn-outline-danger btn-sm">
                                {{$row->role}}
                            </button>
                        </td>
                        <td class="text-center">
                            <a href="{{url('user/editUser/'.$row->user_id)}}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{url('user/deleteUser/'.$row->user_id)}}" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$data->links()}}
    </div>
</div>
