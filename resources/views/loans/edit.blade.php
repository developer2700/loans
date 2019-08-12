<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit/Create Loan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap.min.css')}}" />
</head>
<body>

<div class="container">

    <a class="mt-5 btn btn-success btn-sm" href="{{url('/loans/')}}" >  <--return  </a>
    <div class="card mt-1 mb-5">

        <div class="card-header">
            <h4>Edit  loan's  details </h1>
        </div>
        <div class="card-body">
            <form method="post" id="form-loan" name="form-loan"  enctype="multipart/form-data" >
                <input type="hidden" name="id" id="id" />

                <div class="form row">
                    <div class="form-group col-md-3">
                        <label>UserId*</label>
                        <input type="number" class="form-control required" id="user_id" name="user_id">
                    </div>
                    <div class="form-group col-md-3">
                        <label>amount *</label>
                        <input type="number" class="form-control required" id="amount"  name="amount">
                    </div>
                    <div class="form-group col-md-3">
                        <label>interest * </label>
                        <input type="number" class="form-control required" id="interest"  name="interest">
                    </div>

                    <div class="form-group col-md-3">
                        <label>campaign*</label>
                        <input type="number" class="form-control" id="campaign" name="campaign">
                    </div>

                    <div class="form-group col-md-3">
                        <label>duration*</label>
                        <input type="number" class="form-control"  name="duration" id="duration">
                    </div>

                    <div class="form-group col-md-3">
                        <label>status*</label>
                        <input type="text" class="form-control"  name="status" id="status">
                    </div>


                    <div class="form-group col-md-3">
                        <label>dateLoanEnds</label>
                        <input type="text" class="form-control" id="dateLoanEnds"  name="dateLoanEnds">
                    </div>

                    <div class="form-group col-md-3">
                        <label>dateApplied</label>
                        <input type="text" class="form-control" id="dateApplied"  name="dateApplied">
                    </div>



                    <div class="col-md-12">

                        <button type="submit" class="btn btn-lg btn-info" id="btn-submit">Submit</button>

                    </div>



                </div>
        </div>
        </form>
    </div>

</div>
<script src="{{url('/js/loans.js')}}"></script>
<script>




    let url = window.location.pathname;
    let id = parseInt(url.substring(url.lastIndexOf('/') + 1));
    document.getElementById('id').value=id;

    if(id) { // edit loan
        getLoan(id)
            .catch(e=>console.log(e))
    .then(data=>{
        console.log(data);
        RenderHtmlForm(data.loan)
    });
    }







</script>
</body>
</html>
