<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit/Create User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap.min.css')}}" />
</head>
<body>

<div class="container">

    <a class="mt-5 btn btn-success btn-sm" href="{{url('/users/')}}" >  <--return  </a>
    <div class="card mt-1 mb-5">

        <div class="card-header">
            <h4>Edit  user's  details </h1>
        </div>
        <div class="card-body">
            <form method="post" id="form-user" name="form-user"  enctype="multipart/form-data" >
                <input type="hidden" name="id" id="id" />

                <div class="form row">
                    <div class="form-group col-md-3">
                        <label>personalCode*</label>
                        <input type="text" class="form-control required" id="personalCode" name="personalCode">
                    </div>
                    <div class="form-group col-md-3">
                        <label>email *</label>
                        <input type="text" class="form-control required" id="email"  name="email">
                    </div>
                    <div class="form-group col-md-3">
                        <label>First Name * </label>
                        <input type="text" class="form-control required" id="firstName"  name="firstName">
                    </div>

                    <div class="form-group col-md-3">
                        <label>Last Name*</label>
                        <input type="text" class="form-control" id="lastName" name="lastName">
                    </div>

                    <div class="form-group col-md-3">
                        <label>phone*</label>
                        <input type="text" class="form-control"  name="phone" id="phone">
                    </div>


                    <div class="form-group col-md-3">
                        <label>lang</label>
                        <input type="text" class="form-control" id="lang"  name="lang">
                    </div>

                    <div class="form-group col-md-3">
                        <label>active</label>
                        <input type="text" class="form-control" id="active" name="active">
                    </div>


                    <div class="form-group col-md-3">
                        <label>isDead</label>
                        <input type="text" class="form-control" id="isDead" name="isDead">
                    </div>


                    <div class="col-md-12">

                        <button type="submit" class="btn btn-lg btn-info" id="btn-submit">Submit</button>

                    </div>



                </div>
        </div>
        </form>
    </div>

</div>
<script src="{{url('/js/users.js')}}"></script>
<script>




    let url = window.location.pathname;
    let id = parseInt(url.substring(url.lastIndexOf('/') + 1));
    document.getElementById('id').value=id;

    if(id) { // edit user
        getUser(id)
            .catch(e=>console.log(e))
    .then(data=>{
        console.log(data);
        RenderHtmlForm(data.user)
    });
    }







</script>
</body>
</html>
