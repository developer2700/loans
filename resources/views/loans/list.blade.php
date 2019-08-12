<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Loans List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap.min.css')}}" />
</head>

<body>

<div class="container">
    <a class="btn btn-success mt-5 " href="{{url('/loans/create')}}" >Add New Loan</a>
    <a class="btn btn-success mt-5 " href="{{url('/users')}}" >Search Users</a>



    <div class="card mt-1 mt-1">
        <div class="card-body">



            <form method="get" id="form-search" name="form-search" >
                <div class="row">
                    <div class="form-group col-md-3">
                        <label>user <small>name/last autocomplete</small></label>

                        <input list='autocomplete' class="form-control" name="name" id="autocompleteText">
                        <datalist id="autocomplete">
                            <option>php</option>
                            <option>java</option>
                        </datalist>
                    </div>



                    <div class="form-group col-md-3">
                        <label>min mount</label>
                        <input type="number" class="form-control" id="min_price" name="min_price">
                    </div>

                    <div class="form-group col-md-3">
                        <label>max amount</label>
                        <input type="number" class="form-control" id="max_price" name="max_price">
                    </div>

                    <div class="form-group col-md-3">

                        <button type="submit" class="btn btn-info" id="btn-submit" >Search</button>
                    </div>

                </div>
                <div id="search-result-tip"></div>
            </form>
        </div>
    </div>


    <div class="card mt-1 mb-5">

        <div class="card-header"> <h3> List all Loans </h3></div>
        <div class="card-body">
            <span id="search-result-tip" class="bg-warning px-2"></span>
            <div class="table-responsive ">
                <table id="table-list" class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">LoanId</th>
                        <th scope="col">user</th>
                        <th scope="col">amount</th>
                        <th scope="col">interest</th>
                        <th scope="col">duration</th>
                        <th scope="col">dateApplied</th>
                        <th scope="col">dateLoanEnds</th>
                        <th scope="col">campaign</th>
                        <th scope="col">status</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">#</th>
                        <td>user</td>
                        <td>amount</td>
                        <td>interest</td>
                        <td>duration</td>
                        <td>dateApplied</td>
                        <td>dateLoanEnds</td>
                        <td>campaign</td>
                        <td>status</td>
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

    <script src="{{url('/js/loans.js')}}"></script>
    <script>
        getLoans()
            .catch(e=>console.log(e))
        .then(data=>{
            RenderPagination(data)
        return RenderHtmlTable( data.loans)
        });



    </script>
</body>
</html>
