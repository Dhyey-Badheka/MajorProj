<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <title>Company</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>

        <!-- <h1>Student</h1> -->
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Company</h1>
                    </div>
                    <!-- Actions -->
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                            <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span>Edit</span>
                            </a> -->
                            <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Nav -->
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">All Companies</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Pending</a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="card shadow border-0 mb-7">
            <div class="card-header">
                <!-- <h5 class="mb-0">Students</h5> -->
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Company Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Location</th>
                            <th scope="col">Status</th>
                            <th scope="col">Drive Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <!-- <img alt="..." src="https://images.unsplash.com/photo-1502823403499-6ccfcf4fb453?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" class="avatar avatar-sm rounded-circle me-2"> -->
                                <a class="text-heading font-semibold" href="#">
                                    45367
                                </a>
                            </td>
                            <td>
                                Crest Data Systems
                            </td>
                            <td>
                                <!-- <img alt="..." src="https://preview.webpixels.io/web/img/other/logos/logo-1.png" class="avatar avatar-xs rounded-circle me-2"> -->
                                <a class="text-heading font-semibold" href="#">
                                    Ahmedabad
                                </a>
                            </td>
                            <td>
                                <span class="badge badge-lg badge-dot">
                                    <i class="bg-success"></i>Approved
                                </span>
                            </td>
                            <td>
                                <span class="badge badge-lg badge-dot">
                                    <i class="bg-warning"></i>Ongoing
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="./viewCompany.php?id=<?php echo "id" ?>" class="btn btn-sm btn-neutral">View</a>
                                <a href="./updateCompany.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-pencil"></i></a>
                                <a href="./delCompany.php?id=<?php echo "id" ?>" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="card-footer border-0 py-5">
                <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
            </div>
        </div>





        <p class="copyright">
            &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>