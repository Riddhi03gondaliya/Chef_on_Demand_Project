<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <title>Chef Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />





</head>

<body background="img/bg.jpg">
    <div class="container-xl px-4 mt-4 ">
        <div class="row">
                <form action="user_details_backend.php" method="post" enctype="multipart/form-data">
            <div class="col-xl-8 ">
                <div class="card mb-4 first">
                    <div class="card-header">Account Details</div>
                    <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName">First name</label>
                                <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="fname" required />
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLastName">Last name</label>
                                <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="lname" required />
                            </div>
                        </div>


                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Email</label>
                                <input class="form-control" id="inputLocation" type="email" placeholder="Enter your Email" name="email" required />
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputPhone">Phone number</label>
                                <input class="form-control" id="inputPhone" type="tel" placeholder="Enter your phone number" name="phone" required />
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputEmailAddress">Address</label>
                                <input class="form-control" id="inputEmailAddress" type="text" placeholder="Enter your Address" name="address" required />
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">City</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your City" name="city" required />
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Zip Code</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your Zip Code" name="zip_code" required />
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">State</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your State" name="state" required />
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Country</label>
                                <input class="form-control" id="inputLocation" type="text" placeholder="Enter your Country" name="country" required />
                            </div>
                        </div>






                        <button class="btn btn-primary" type="submit">
                            Submit
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        body {
            margin-top: 20px;
            color: #000000;

        }

        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;

        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input,
        .form-select {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            background-color: rgba(255, 255, 255, 0);
            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);
        }

        .nav-borders .nav-link.active {
            color: #1a1b1d;
            border-bottom-color: #17181a;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .first {
            background-color: rgba(255, 255, 255, 0);

            -webkit-backdrop-filter: blur(5px);
            backdrop-filter: blur(5px);


        }

        .btn-primary {
            color: #fff;
            background-color: #000000;
            border-color: #000000;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: black;
            border-color: black;
        }

        /* cuisines */

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: rgba(255, 255, 255, 0.5);
            background-clip: border-box;
            border: 1px solid #d2d2dc;
            border-radius: 0
        }

        .card .card-body {
            padding: 1.25rem 1.75rem;
            background-color: rgba(255, 255, 255, 0.5);


        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .card .card-title {
            color: #000000;
            margin-bottom: 0.625rem;
            text-transform: capitalize;
            font-size: 0.875rem;
            font-weight: 500
        }

        .card .card-description {
            margin-bottom: .875rem;
            font-weight: 400;
            color: #76838f
        }

        p {
            font-size: 0.875rem;
            margin-bottom: .5rem;
            line-height: 1.5rem
        }


        label.check {
            cursor: pointer;
            padding: 2px;
        }

        label.check input {
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            pointer-events: none;
        }

        label.check span {
            padding: 7px 14px;
            border: 2px solid #69707a;
            display: inline-block;
            color: #69707a;
            border-radius: 3px;
            text-transform: uppercase;
        }

        label.check input:checked+span {
            border-color: #69707a;
            background-color: black;
            color: #fff;
        }

        .scroll {
            max-height: 100px;
            overflow-y: auto;
        }
    </style>
    <script type="text/javascript">
        const imageInput = document.getElementById("imageInput");
        const previewImage = document.getElementById("previewImage");

        imageInput.addEventListener("change", () => {
            const file = imageInput.files[0];
            const reader = new FileReader();

            reader.addEventListener("load", () => {
                previewImage.src = reader.result;
            });

            reader.readAsDataURL(file);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
</body>

</html>