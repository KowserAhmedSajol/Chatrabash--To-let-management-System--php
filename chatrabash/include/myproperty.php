<section>
    <div class="card" style="border-style: hidden">
        <div class="card-body">
            <div class="row">
                <?php
                $conn = mysqli_connect("localhost", "root", "", "chatrabash");

                $sql = "SELECT * FROM property_list WHERE user_id=$id";
                $query = mysqli_query($conn, $sql);

                function getPostThumb($conn, $id)
                {
                    $query2 = "SELECT * FROM property_images WHERE property_id=$id";
                    $run = mysqli_query($conn, $query2);
                    $data = mysqli_fetch_assoc($run);
                    return $data['photo'];
                }
                while ($data = mysqli_fetch_assoc($query))
                {
                    ?>
                    <li id="schedule_link_mobile">
                        <div class="col-md-4">
                            <div><a href="#">
                                    <img class="rounded img-fluid shadow w-100 fit-cover" alt=" " src="imag/listingImg/<?= getPostThumb($conn, $data['list_id']) ?>" style="height: auto;">
                                </a>
                            </div>
                        </div>

                        <div class="col">
                            <div class="py-4">
                                <span class="badge bg-primary mb-2" style="font-size: 14px;">
                                    <strong>&nbsp;<i class="fa-solid fa-bangladeshi-taka-sign"></i> <?php echo $data['rent_rate'];?> /Monthly</strong><br>
                                </span>

                                <header>
                                    <p class="fw-bold" style="font-size: large" ><span>Property name:&nbsp;<?php echo $data['property_name']; ?></span></p>
                                </header>
                                <p class="text-muted"><i class="fa-solid fa-server"></i><span style="color: rgb(0, 0, 0);font-size: medium">&nbsp;Status : <?php echo $data['status'];?></span></p>
                                <p class="text-muted"><i class="fa-solid fa-magnifying-glass-location"></i><span style="color: rgb(0, 0, 0);">&nbsp;Location: <?php echo $data['uni_location']; ?></span><br></p>
                                <p class="text-muted"><i class="fa-solid fa-sack-dollar"></i><span style="color: rgb(0, 0, 0);">&nbsp;Price:<?php echo $data['rent_rate']; ?>tk/Monthly&nbsp;</span><br></p>
                                <p class="text-muted"><i class="fa-solid fa-person-shelter"></i><span style="color: rgb(0, 0, 0);">&nbsp;Room Type: <?php echo $data['property_type']; ?></span></p>
                                <p class="text-muted"><i class="fa-solid fa-circle-user"></i><span style="color: rgb(0, 0, 0);">&nbsp;Gender: <?php echo $data['gender']; ?></span><br></p>
                                <a class="btn btn-outline-primary btn-sm" href="single_property_show.php?id=<?= $data['list_id']?>"> <i class="fa-solid fa-binoculars"></i>&nbsp;View<br></a>
                            </div>
                        </div>
                    </li>

                    <li id="schedule_link_pc">
                        <table class="table-hover">
                            <thead>
                            </thead>

                            <tbody>
                            <tr>
                                <td style="width:50%;">

                                    <div class="">
                                        <div>
                                            <a href="#"><img class="rounded img-fluid shadow w-100 fit-cover" alt=" " src="imag/listingImg/<?= getPostThumb($conn, $data['list_id']) ?>">
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <td style="width:40%;">
                                    <div class="col" style="margin-left: 50px;margin-right: ">
                                        <div class="py-4">
                                            <span class="badge bg-primary mb-2" style="font-size: 14px;">
                                                <strong>&nbsp;<i class="fa-solid fa-bangladeshi-taka-sign"></i> <?php echo $data['rent_rate'];?> /Monthly</strong><br>
                                            </span>

                                            <header><p class="fw-bold" style="font-size: large" ><span>Property name:&nbsp;<?php echo $data['property_name']; ?></span></p>
                                            </header>

                                            <p class="text-muted"><i class="fa-solid fa-server"></i><span style="color: rgb(0, 0, 0);font-size: medium">&nbsp;Status : <?php echo $data['status'];?></span></p>
                                            <p class="text-muted"><i class="fa-solid fa-magnifying-glass-location"></i><span style="color: rgb(0, 0, 0);">&nbsp;Location: <?php echo $data['uni_location']; ?></span><br></p>
                                            <p class="text-muted"><i class="fa-solid fa-user-graduate"></i><span style="color: rgb(0, 0, 0);">&nbsp;University :<?php echo $data['university_name'];?></span><br></p>

                                            <p class="text-muted"><i class="fa-solid fa-person-shelter"></i><span style="color: rgb(0, 0, 0);">&nbsp;Room Type: <?php echo $data['property_type']; ?></span></p>
                                            <p class="text-muted"><i class="fa-solid fa-circle-user"></i><span style="color: rgb(0, 0, 0);">&nbsp;Gender: <?php echo $data['gender']; ?></span><br></p>

                                        </div>
                                    </div>
                                </td>
                                <td style="width:10%;">
                                    <a class="btn btn-outline-primary btn-sm" href="single_property.php?id=<?= $data['list_id']?>"> <i class="fa-solid fa-binoculars"></i>&nbsp;View</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </li>

                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>