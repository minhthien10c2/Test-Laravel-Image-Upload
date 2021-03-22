<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .container{
            height: 500px;
        }
        
        .image-container{
            position: relative;
        }

        .delete{         
            opacity: 0.5;
            position: absolute;
            font-size:11px;
            width: 17px;
            height: 17px;
            color: #d4331e;
            background-color: #ffffff;
            z-index:10;
            right: 22px;
            top: 8px;
            border-radius: 50px;
            border:none;
            transition: all 0.3s ease;
        }
        .delete:hover{          
            opacity: 1;
            color: #d4331e;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row h-100">
            <div class="col-12 text-center my-auto">
                <div class="col-8 m-auto">                    
                    <div class="alert alert-warning fade" role="alert">
                        
                    </div>
                </div>
                <div class="col-8 m-auto">
                    <form action="{{route('images.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mb-3">
                            
                                <input type="file" name="file" class="custom-file-input d-none" id="file-custom" placeholder="Some text">
                                <label class="form-control custom-file-lb text-left" for="file-custom">Choose file to upload</label>
                            
                            <div class="input-group-prepend">
                                <div class="input-group">
                                    <input type="submit" class="btn btn-primary submit" value="Upload">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <h2 class="mt-5">Recent uploaded file</h2>
                <div class="col-12 mt-5 d-flex justify-content-center">
                        @foreach($images as $image)
                        <div class="image-container col-3 mr-2">
                            <a href="{{route('images.show', $image['id'])}}">
                                <img src="{{$image['file_url']}}" class="img-thumbnail">
                            </a>
                            <form action="{{ route('images.destroy' , $image['id'])}}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE" />
                                <input type="submit" class="delete text-middle align-middle close" value="x">
                            </form>
                        </div>
                            
                        @endforeach
                    
                </div>
            </div> 
        </div>
    </div>
</body>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(".submit").on("click",function(){
            if($(".custom-file-input").val() == ""){
                $(".alert").text("Please choose a file");
                $(".alert").addClass("show");
                return false;
            }
            return true;
        });
        $(".custom-file-input").on("click", function() {
            $(".alert").removeClass("show");
        });
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            var re = /(?:\.([^.]+))?$/;
            var ext = re.exec(fileName)[1];
            if(ext == "bmp" || ext == "jpg" || ext == "jpeg" || ext == "gif" ||ext == "png")
            {
                $(this).siblings(".custom-file-lb").addClass("selected").html(fileName);
            }
            else
            {
                fileName="Choose file to upload";
                $(this).siblings(".custom-file-lb").addClass("selected").html(fileName);
                $(this).val("");
                $(".alert").text("Please choose the correct image file format");
                $(".alert").addClass("show");
            }
        });
        
    </script>
</html>