<div class="card card-data m-1" style="width: 24%">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $email }}</p>
        <div class="row">
            <div class="col-md-12">
                <form action="{{ $delete_route }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <a href="{{ $show_route }}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                    <a href="{{ $edit_route }}" class="btn btn-success"><i class="fas fa-edit"></i></a>
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
    .card-data:hover {
        transition: all .2s ease-in-out;
        transform: scale(1.015); 
    }

    .test {
        display: flex;
        flex-direction: row;
        width: 100vw;
        border: 1px solid red
    }
</style>