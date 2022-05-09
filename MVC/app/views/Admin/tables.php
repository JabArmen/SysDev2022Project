<?php require APPROOT . '/views/includes/header.php'; ?>
<link rel="stylesheet" href="<?php echo URLROOT; ?>/css/templatemo-styleigor.css">

<body>

<?php require APPROOT . '/views/includes/nav.php'; ?>

    <div class="page-heading">
        <div class="container">
            <div class="heading-content">
                <h1>Webmaster <em>Controls</em></h1>
            </div>
        </div>
    </div>


    <div class="tool-box">
        <div class="container">
            <div class="blog-post">
                <div class="admin-management">
                    <h1>
                        Manage Administrators
                    </h1>  
                    <a href="Admin/addAdministrator">Add Administrator</a>
                    <!-- table listing all admins -->
                    <table class="table table-bordered table table-striped table-hover bg-light">
                        <thead>
                            <tr class="bg-info bg-gradient">
                                <td colspan="1">
                                    ID
                                </td>
                                <td colspan="2">
                                    Actions
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach ($data["admins"] as $admin)
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo($admin->admin_name);
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<a href='#'>Rename</a>";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<a href='#'>Revoke</a>";
                                        echo "</td>";
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
                    <a href="Admin/addPost">Add Post</a>
                    <!-- table listing all posts -->
                    <table class="table table-bordered table table-striped table-hover bg-light">
                        <thead>
                            <tr class="bg-info bg-gradient">
                                <td colspan="1">
                                    Post Title
                                </td>
                                <td colspan="1">
                                    Author
                                </td>
                                <td colspan="2">
                                    Actions
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- list of posts -->
                            <?php
                                foreach ($data["posts"] as $post)
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo($post->post_title);
                                        echo "</td>";
                                        echo "<td>";
                                            $admin = $data["adminModel"]->getAdmin($post->admin_id);
                                            if ($admin == false)
                                            {
                                                echo "Unknown";
                                            }
                                            else
                                            {
                                                echo($admin->admin_name);
                                            }
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<a href='#'>Edit</a>";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<a href='#'>Delete</a>";
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
                                foreach ($data["actions"] as $action)
                                {
                                    echo "<tr>";
                                        echo "<td>";
                                            echo($action->action_type);
                                        echo "</td>";
                                        echo "<td>";
                                            echo(date('m/d/Y H:i:s', $action->timestamp));
                                        echo "</td>";
                                        echo "<td>";
                                            echo($action->ip_address);
                                        echo "</td>";
                                        echo "<td>";
                                            $admin = $data["adminModel"]->getAdmin($action->admin_id);
                                            if ($admin == false)
                                            {
                                                echo "Unknown";
                                            }
                                            else
                                            {
                                                echo($admin->admin_name);
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