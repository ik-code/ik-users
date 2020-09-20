<div class="wrap">

    <div id="icon-options-general" class="icon32"></div>
    <h1>Users Data from https://jsonplaceholder.typicode.com</h1>

    <div id="poststuff">

        <div id="post-body" class="metabox-holder columns-2">

            <!-- main content -->
            <div id="post-body-content">

                <div class="meta-box-sortables ui-sortable">
                    <?php if ( ! isset( $ik_users_endpoint_to_call ) || $ik_users_endpoint_to_call != '/users' ): ?>

                        <div class="postbox">

                            <h2 class="hndle">
                                <span>Lets Get Started</span>
                            </h2>

                            <div class="inside">
                                <form method="post" action="">
                                    <input name="ik_users_form_submitted" type="hidden" value="Y"/>

                                    <table class="form-table">
                                        <tr valign="top">
                                            <td scope="row">
                                                <label for="tablecell">The endpoint to call is /users. Please, type only /users for this App to start working.</label>
                                            </td>
                                            <td>
                                                <input name="ik_users_endpoint_to_call" id="ik_users_endpoint_to_call" type="text" value="" class="regular-text"/>
                                            </td>
                                        </tr>
                                    </table>
                                    <p>
                                        <input class="button-primary" type="submit" name="ik_users_form_submit" value="Save"/>
                                    </p>
                                </form>
                            </div>
                            <!-- .inside -->

                        </div>
					<?php else: ?>
                        <!-- .postbox -->

                        <div class="postbox">

                            <h2 class="hndle">
                                <span>User List</span>
                            </h2>

                            <div class="inside">
                                <br class="clear"/>
                                <table class="widefat">
                                    <thead>
                                    <tr>
                                        <th class="row-title">ID</th>
                                        <th>Name</th>
                                        <th>Username</th>

                                        <th>More Details</th>
                                    </tr>
                                    </thead>
                                    <tbody>

									<?php
									$response_body = Ik_Users_Get_result( $ik_users_endpoint_to_call );
									$count = count( Ik_Users_Get_result( $ik_users_endpoint_to_call ) );
									$i = 0;
									while ( $i < $count ):
										?>
                                        <tr>
                                            <td><?php echo $response_body[ $i ]->{'id'}; ?></td>
                                            <td><?php echo $response_body[ $i ]->{'name'}; ?></td>
                                            <td><?php echo $response_body[ $i ]->{'username'}; ?></td>
                                            <td><a class="button-secondary btn-user" href="#json-user-details"
                                                   data-user="<?php echo $response_body[ $i ]->{'id'}; ?>">More
                                                    Details</a></td>
                                        </tr>
										<?php $i++; endwhile; ?>

                                </table>
                            </div>
                            <!-- .inside -->

                        </div>
					<?php endif; ?>
                    <!-- .postbox -->

                    <div class="json-user-details" id="json-user-details"></div><!-- .json-feed-box -->

                    <div class="postbox json-feed-box">

                        <h2 class="hndle">
                            <span>JSON Feed</span>
                        </h2>

                        <div class="inside">
                            <pre>
                            <?php
                            var_dump( Ik_Users_Get_result( $ik_users_endpoint_to_call ) );
                            ?>
                            </pre>
                        </div>
                        <!-- .inside -->

                    </div>
                    <!-- .postbox -->

                </div>
                <!-- .meta-box-sortables .ui-sortable -->

            </div>
            <!-- post-body-content -->

            <!-- sidebar -->
            <div id="postbox-container-1" class="postbox-container">

                <div class="meta-box-sortables">
					<?php if ( isset( $ik_users_endpoint_to_call ) && $ik_users_endpoint_to_call == '/users' ): ?>
                        <div class="postbox">

                            <h2 class="hndle"><span>The endpoint to call is /users. Please, type only /users for this App to start working.</span>
                            </h2>

                            <div class="inside">
                                <form method="post" action="" class="">
                                    <input name="ik_users_form_submitted" type="hidden"
                                           value="Y"/>

                                    <p>
                                        <input name="ik_users_endpoint_to_call" id="ik_users_endpoint_to_call"
                                               type="text"
                                               value="<?php echo $ik_users_endpoint_to_call; ?>" class="all-options"/>
                                    </p>

                                    <p>
                                        <input class="button-primary" type="submit" name="ik_users_form_submit"
                                               value="Update"/>
                                    </p>

                                </form>
                            </div>
                            <!-- .inside -->

                        </div>
                        <!-- .postbox -->
					<?php endif; ?>
                </div>
                <!-- .meta-box-sortables -->

            </div>
            <!-- #postbox-container-1 .postbox-container -->

        </div>
        <!-- #post-body .metabox-holder .columns-2 -->

        <br class="clear">
    </div>
    <!-- #poststuff -->

</div> <!-- .wrap -->