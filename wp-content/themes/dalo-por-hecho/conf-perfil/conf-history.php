<?php global $current_user, $wp_roles; ?>
                <!--tab history -->
                <div class="tab-pane fade" id="v-pills-history" role="tabpanel"  aria-labelledby="v-pills-history-tab">
                    <?php $pf = 0;
                    $pedidos = get_posts( array(
                    'numberposts' => -1,
                    'meta_key'    => '_customer_user',
                    'meta_value'  => get_current_user_id(),
                    'post_type'   => wc_get_order_types(),
                    'post_status' => "wc-completed",

                    ) );
                    foreach ($pedidos as $pedido)
                    {
                        $wp_pedido = new WC_Order($pedido->ID);
                        $cant_pedidos = $cant_pedidos +1;
                        $gastado = $gastado + $wp_pedido->discount_total;
                        if ($pf < 1) {
                            $primera_fecha = $wp_pedido->date_created; 
                        }
                        $ultima_fecha = $wp_pedido->date_created;
                        $pf = $pf + 1;
                    }
                    $trans = "".$cant_pedidos." transacciones del ".date_order_new($primera_fecha)." al ".date_order_new($ultima_fecha).""; ?>
                    <div class="content-metodos-pago">
                        <h5>Historial de pagos</h5>
                        <div class="container mt-3">
                            <ul class="nav nav-tabs h-p-nav-tab">
                                <li class="nav-item">
                                    <a class="nav-link historial-pago-tab active" data-toggle="tab"
                                                    href="#ganado">Ganado</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link historial-pago-tab" data-toggle="tab"
                                                    href="#saliente">Saliente</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="ganado" class="container tab-pane active"><br>
                                    <div class="cont-pago-estado">
                                        <div class="cont-pago-estado-tab">
                                            <!-- <p>Demostración</p> -->
                                            <div class="cont-pago-estado-form">

                                            </div>
<!--                                             <small>1 transacciones del 07 de noviembre del 2020 al 30 de
                                                            noviembre del 2020
                                            </small> -->
                                            <div class="tabla-pagos">
                                                <table class="tabla-pagos_table">
                                                    <thead>
                                                        <tr>
                                                            <th>Fecha de la tarea</th>
                                                            <th>Nombre de la tarea</th>
                                                            <th>Pago realizado</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $args3 = array (
                                                            'post_type' => 'asignados',
                                                            'post_status' =>'publish',
                                                            'meta_query' => array(
                                                            'relation'=>'AND', // 'AND' 'OR' ...
                                                            array(
                                                               'key' => 'asignar_status',
                                                               'value' => 'Completado',
                                                               'operator' => 'IN',
                                                            ),                                                            
                                                            array(
                                                               'key' => 'asignar_id_empleado',
                                                               'value' => get_current_user_id(),
                                                               'operator' => 'IN',
                                                            )),                     
                                                        ); 
                                                        $i = 0;
                                                        $loop3 = new WP_Query( $args3 ); 
                                                        while ( $loop3->have_posts() ) : $loop3->the_post(); 
                                                         $fecha_tarea_publicada = get_post_meta( get_field( 'asignar_id_tarea_publicada' ), '_job_expires', true );

                                                         


                                                        ?>
                                                            <tr>
                                                                <td class="tabla-pagos_table_td">
                                                                    <p><?php  echo date("d/m/y",strtotime($fecha_tarea_publicada)); ?> </p>
                                                                </td>

                                                                <td class="tabla-pagos_table_td">
                                                                    <p><?php echo $loop3->posts[$i]->post_title; ?></p>
                                                                </td>
                                                                
                                                                <td class="tabla-pagos_table_td">
                                                                    <p class="n-m">$ <?php echo 
                                                                    number_format(get_field('asignar_monto_tarea'), 0, '.', '.'); ?></p>
                                                                </td>
                                                            </tr>
                                                        <?php endwhile; $i = 0; $i++  ?>   
                                                    </tbody>
                                                </table>
                                            </div>
                                            </div>
                                                </div>
                                            </div>
                                            <div id="saliente" class="container tab-pane  fade"><br>
                                                <div class="cont-pago-estado">
                                                    <div class="cont-pago-estado-tab">
                                                        <!-- <p>Demostración s</p> -->
                                                        <div class="cont-pago-estado-form">

                                                        </div>
                                                        <!-- <small><?php echo $trans ?> </small> -->
                                                        <div class="tabla-pagos">
                                                            <table class="tabla-pagos_table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Fecha de la tarea <?php echo get_current_user_id(); ?></th>
                                                                        <th>Nombre de la tarea</th>
                                                                        <th>Pago realizado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>                                                                  
                                                        <?php
                                                        $args3 = array (
                                                            'post_type' => 'asignados',
                                                            'post_status' =>'publish',
                                                            'meta_query' => array(
                                                            'relation'=>'AND',                                     
                                                            array(
                                                               'key' => 'asignar_id_empleador',
                                                               'value' => get_current_user_id(),
                                                               'operator' => 'IN',
                                                            )),                     
                                                        );
                                                        $loop3 = new WP_Query( $args3 ); 
                                                        while ( $loop3->have_posts() ) : $loop3->the_post(); 
                                                         $fecha_tarea_publicada = get_post_meta( get_field( 'asignar_id_tarea_publicada' ), '_job_expires', true );
                                                         


                                                        ?>                                                            
                                                            <tr>
                                                                <td class="tabla-pagos_table_td">
                                                                    <p><?php  echo date("d/m/y",strtotime($fecha_tarea_publicada)); ?> </p>
                                                                </td>
                                                                <td class="tabla-pagos_table_td">
                                                                    <p><?php echo get_the_title(); ?></p>
                                                                </td>
                                                                <td class="tabla-pagos_table_td">
                                                                    <p class="n-m">$ <?php echo  number_format(get_field('asignar_monto_tarea'), 0, '.', '.'); ?></p>
                                                                </td>
                                                            </tr>
                                                        <?php endwhile; ?>                                                          

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>