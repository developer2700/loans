<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Users List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap.min.css')}}" />
</head>

<body>

<div class="container">
    <a class="btn btn-success mt-5 " href="{{url('/users/create')}}" >Add New User</a>
    <a class="btn btn-success mt-5 " href="{{url('/loans')}}" >Search Loans</a>

    <div class="card mt-1 mb-5">

        <div class="card-header"> <h1> List all users </h1></div>
        <div class="card-body">
            <span id="search-result-tip" class="bg-warning px-2"></span>
            <div class="table-responsive ">
                <table id="table-list" class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">FullName</th>
                        <th scope="col">Email</th>
                        <th scope="col">personalCode</th>
                        <th scope="col">lang</th>
                        <th scope="col">phone</th>
                        <th scope="col">Active</th>
                        <th scope="col">isDead</th>
                        <th scope="col">birthDate</th>
                        <th scope="col">Age</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">#</th>
                        <td>FullName</td>
                        <td>Email</td>
                        <td>personalCode</td>
                        <td>lang</td>
                        <td>phone</td>
                        <td>Active</td>
                        <td>isDead</td>
                        <td>
                            <a class=" btn btn-info btn-sm" href="edit" >Edit</a>
                            <a data-id="1"  class="btn-delete btn btn-danger btn-sm" href="delete" >delete</a>
                        </td>
                    </tr>

                    </tbody>
                </table>

                <div id="pagination"></div>
            </div>
        </div>
    </div>

    <script src="{{url('/js/users.js')}}"></script>
    <script>
        getUsers()
            .catch(e=>console.log(e))
        .then(data=>{
            RenderPagination(data)
        return RenderHtmlTable( data.users)
        });



    </script>
</body>
</html>
