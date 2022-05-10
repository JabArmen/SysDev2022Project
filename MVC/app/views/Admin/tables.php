<?php require APPROOT . '/views/includes/headerAdmin.php'; ?>

<body>

    <?php require APPROOT . '/views/includes/nav.php'; ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Administrator <em>Controls</em></h1>
            </div>
        </div>
    </div>

    <div class="tool-box">
        <div class="container">
            <div class="blog-post">
                <div class="form-management">
                    <h1>
                        Contact Form Respones
                    </h1>

                    <!-- card showing message -->
                    <div id="msgCard">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" id="msgTitle">Card title</h5>
                                <h6 class="card-subtitle mb-2 text-muted" id="msgSub">Card subtitle</h6>
                                <p class="card-text" id="msgContent">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a class="btn card-header" href="javascript:void(0);" onclick="javascript:hideMessage()">Hide Message</a>
                            </div>
                        </div>
                        <br>
                    </div>

                    <!-- table listing all form responses -->
                    <!-- how the FUCK did we miss this lmao -->
                    <table class="table table-bordered table table-striped table-hover bg-light">
                        <thead>
                            <tr class="bg-info bg-gradient">
                                <td colspan="1">
                                    Client Name
                                </td>
                                <td colspan="1">
                                    Client Email
                                </td>
                                <td colspan="1">
                                    Client Phone No.
                                </td>
                                <td colspan="1">
                                    Requested Service
                                </td>
                                <td colspan="3">
                                    Actions
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- list of posts -->
                            <?php
                            foreach ($data["response"] as $resp) {
                                echo "<tr>";
                                echo "<td>";
                                echo ("$resp->client_name $resp->client_surname");
                                echo "</td>";
                                echo "<td>";
                                echo ($resp->client_email);
                                echo "</td>";
                                echo "<td>";
                                if (isset($resp->client_phone)) {
                                    echo ($resp->client_phone);
                                }
                                echo "</td>";
                                echo "<td>";
                                echo ($resp->service);
                                echo "</td>";
                                echo "<td>";
                                echo "<a href='#msgCard' onclick='javascript:changeMessage(";
                                echo ("\"$resp->client_name $resp->client_surname\",");
                                echo ("\"$resp->client_email\",");
                                echo ("\"$resp->message\"");
                                echo ");'>See Message</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a href='mailto:$resp->client_email'>Contact Back</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a href='/MVC/Admin/deleteResponse/$resp->form_id'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="admin-management">
                    <h1>
                        Manage Administrators
                    </h1>
                    <?php
                    if (isLoggedInWebmaster()) {
                        echo '<a href="addAdministrator">Add Administrator</a>';
                    }

                    if (isset($data['msgerror'])) {
                        echo "<br>";
                        echo "<font color='red'>" . $data['msgerror'] . "</font>";
                        echo "</br>";
                    }
                    ?>

                    <!-- table listing all admins -->
                    <table class="table table-bordered table table-striped table-hover bg-light">
                        <thead>
                            <tr class="bg-info bg-gradient">
                                <td colspan="1">
                                    ID
                                </td>
                                <?php
                                // if (isLoggedInWebmaster()){
                                echo "<td colspan='2'>";
                                echo "Actions";
                                echo "</td>";
                                //  }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data["admins"] as $admin) {
                                echo "<tr>";
                                echo "<td>";
                                echo ($admin->admin_name);
                                echo "</td>";
                                if (isLoggedInWebmaster()) {
                                    if ($admin->admin_id != 0) {
                                        echo "<td>";
                                        echo "<a href='/MVC/Admin/rename/$admin->admin_id'>Rename</a>";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<a href='/MVC/Admin/delete/$admin->admin_id'>Revoke</a>";
                                        echo "</td>";
                                    } else {
                                        echo "<td colspan='2'>";
                                        echo "<a href='/MVC/Admin/rename/$admin->admin_id'>Rename</a>";
                                        echo "</td>";
                                    }
                                }
                                if ($_SESSION['admin_id'] == $admin->admin_id && !isLoggedInWebmaster()) {
                                    echo "<td>";
                                    echo "<a href='/MVC/Admin/rename/$admin->admin_id'>Rename</a>";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "<a href='/MVC/Admin/delete/$admin->admin_id'>Delete my account</a>";
                                    echo "</td>";
                                } else if (!isLoggedInWebmaster()) {
                                    echo "<td>";
                                    echo "DISABLED";
                                    echo "</td>";
                                    echo "<td>";
                                    echo "DISABLED";
                                    echo "</td>";
                                }
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="post-management">
                    <h1>
                        Manage Posts
                    </h1>
                    <a href="addPost">Add Post</a>
                    <!-- table listing all posts -->
                    <table class="table table-bordered table table-striped table-hover bg-light">
                        <thead>
                            <tr class="bg-info bg-gradient">
                                <td colspan="1">
                                    Post Title
                                </td>
                                <td colspan="1">
                                    Created By:
                                </td>
                                <td colspan="2">
                                    Actions
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- list of posts -->
                            <?php
                            foreach ($data["posts"] as $post) {
                                echo "<tr>";
                                echo "<td>";
                                echo ($post->post_title);
                                echo "</td>";
                                echo "<td>";
                                $admin = $data["adminModel"]->getAdmin($post->admin_id);
                                if ($admin == false) {
                                    echo "DELETED";
                                } else {
                                    echo ($admin->admin_name);
                                }
                                echo "</td>";
                                echo "<td>";
                                echo "<a href='/MVC/Admin/edit/$post->post_id'>Edit</a>";
                                echo "</td>";
                                echo "<td>";
                                echo "<a href='/MVC/Admin/deletePost/$post->post_id'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="telemetry-management">
                    <h1>
                        Site Activity
                    </h1>
                    <!-- everything that happened on the site -->
                    <table class="table table-bordered table table-striped table-hover bg-light">
                        <thead>
                            <tr class="bg-info bg-gradient">
                                <td colspan="1">
                                    Action
                                </td>
                                <td colspan="1">
                                    Timestamp
                                </td>
                                <td colspan="1">
                                    IP Address
                                </td>
                                <td colspan="1">
                                    User
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- list of actions logged -->
                            <?php
                            foreach ($data["actions"] as $action) {
                                echo "<tr>";
                                echo "<td>";
                                echo ($action->action_type);
                                echo "</td>";
                                echo "<td>";
                                echo (date('m/d/Y H:i:s', $action->timestamp));
                                echo "</td>";
                                echo "<td>";
                                echo ($action->ip_address);
                                echo "</td>";
                                echo "<td>";
                                $admin = $data["adminModel"]->getAdmin($action->admin_id);
                                if ($admin == false) {
                                    echo "Unknown";
                                } else {
                                    echo ($admin->admin_name);
                                }
                                echo "</td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php require APPROOT . '/views/includes/footer.php'; ?>