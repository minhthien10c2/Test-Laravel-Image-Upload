<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .custom-file-input:lang(en)~.custom-file-label::after{
            content: "Upload";
        }
        .container{
            height: 500px;
        }
        *{
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 text-center my-auto">
                <div class="col-8 m-auto">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            
                            <input type="file" class="form-control d-none" id="file-custom" placeholder="Some text">
                            <label class="form-control text-left" for="file-custom">Chose file to upload</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="submit" value="Upload">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <h2 class="mt-5">Recent uploaded file</h2>
                <div class="col-12 m-auto">
                <div class="mt-5">
                    @foreach($images as $image)
                        <img src="{{$image['file_url']}}" class="img-thumbnail col-3 mr-2">
                    @endforeach
                </div>
                </div>
            </div> 
            <div class="align"></div>
        </div>
    </div>
</body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>