public function transferir(Request $request) {
        $user_id = Auth::user()->id;
        $monto_a_transferir = $request->monto;
        $puntos_acumulados = $request->punto_acumulado;
        $user_a_regalar = $request->cuenta;
        $user_a_transferir = DB::select("SELECT id, name FROM users WHERE id = '$request->cuenta'");
        $columna1 = DB::select('SELECT id, disc_puntualidad_pos from puntos where user_id ='. $user_id);
        $columna2 = DB::select('SELECT id, productividad_pos from puntos where user_id ='. $user_id);
        $columna3 = DB::select('SELECT id, gestion_pos from puntos where user_id ='. $user_id);
        $acumulado = 0;
        $col = 1;

        if ($monto_a_transferir <= $puntos_acumulados) {

            if ($user_a_transferir) {

                    while ($monto_a_transferir > $acumulado) {

                        $columna = 'columna'.$col; 

                        $registros = count($columna1);

                        if ($col == 1) {
                            for ($i=0; $registros >= $i; $i++) {
                                
                                if ($acumulado < $monto_a_transferir) {
                                    // var_dump($columna1[$i]->disc_puntualidad_pos); die;
                                    $acumulado = $acumulado + $columna1[$i]->disc_puntualidad_pos;

                                    if ($acumulado ==  $monto_a_transferir) {
                                        var_dump('acumulado ya es igual al monto a transferir '.$acumulado);

                                        // actualiza el registro
                                        $punto = Punto::findOrFail($columna1[$i]->id);
                                        $punto->disc_puntualidad_pos = 0;
                                        $punto->save();

                                        // registra la transeferencia
                                        $regalo = new Regalo();
                                        $regalo->puntos = $acumulado;
                                        $regalo->user_regalo = $user_id;
                                        $regalo->user_recibio = $user_a_regalar;
                                        $regalo->save();
                                        var_dump('se regalo');

                                    }

                                    if ($acumulado <  $monto_a_transferir) {

                                        var_dump('el acumulado quedo en '. $acumulado . ' y el monto a transferir es '. $monto_a_transferir);
                                        //
                                        // $acumulado = $acumulado + $columna1[$i]->disc_puntualidad_pos;

                                        // actualiza el registro
                                        $punto = Punto::findOrFail($columna1[$i]->id);
                                        $punto->disc_puntualidad_pos = 0;
                                        $punto->save();

                                    }

                                    if ($acumulado > $monto_a_transferir) {
                                        var_dump('el acumulado '. $acumulado . ' ya paso al monto a transferir '. $monto_a_transferir);
                                        $vuelto = $acumulado - $monto_a_transferir;

                                        // actualiza el registro
                                        $punto = Punto::findOrFail($columna1[$i]->id);
                                        $punto->disc_puntualidad_pos = $vuelto;
                                        $punto->save();

                                        // registra la transeferencia
                                        $regalo = new Regalo();
                                        $regalo->puntos = $monto_a_transferir;
                                        $regalo->user_regalo = $user_id;
                                        $regalo->user_recibio = $user_a_regalar;
                                        $regalo->save();
                                    }

                                }

                            }
                        }
                        // if ($col == 2 && $acumulado < $monto_a_transferir) {
                        //     for ($i=0; $registros >= $i; $i++) {
                                
                        //         if ($acumulado < $monto_a_transferir) {
                        //             // var_dump($columna1[$i]->disc_puntualidad_pos); die;
                        //             $acumulado = $acumulado + $columna2[$i]->productividad_pos;

                        //             if ($acumulado ==  $monto_a_transferir) {
                        //                 var_dump('acumulado ya es igual al monto a transferir '.$acumulado);

                        //                 // actualiza el registro
                        //                 $punto = Punto::findOrFail($columna[$i]->id);
                        //                 $punto->productividad_pos = 0;
                        //                 $punto->save();

                        //                 // registra la transeferencia
                        //                 $regalo = new Regalo();
                        //                 $regalo->puntos = $acumulado;
                        //                 $regalo->user_regalo = $user_id;
                        //                 $regalo->user_recibio = $user_a_regalar;
                        //                 $regalo->save();
                        //                 var_dump('se regalo');

                        //             }

                        //             if ($acumulado <  $monto_a_transferir) {

                        //                 var_dump('el acumulado quedo en '. $acumulado . ' y el monto a transferir es '. $monto_a_transferir);
                        //                 //
                        //                 // $acumulado = $acumulado + $columna2[$i]->productividad_pos;

                        //                 // actualiza el registro
                        //                 $punto = Punto::findOrFail($columna1[$i]->id);
                        //                 $punto->productividad_pos = 0;
                        //                 $punto->save();

                        //             }

                        //             if ($acumulado > $monto_a_transferir) {
                        //                 var_dump('el acumulado '. $acumulado . ' ya paso al monto a transferir '. $monto_a_transferir);
                        //                 $vuelto = $acumulado - $monto_a_transferir;

                        //                 // actualiza el registro
                        //                 $punto = Punto::findOrFail($columna2[$i]->id);
                        //                 $punto->productividad_pos = $vuelto;
                        //                 $punto->save();

                        //                 // registra la transeferencia
                                       $regalo = new Regalo();
                        //                 $regalo->puntos = $monto_a_transferir;
                        //                 $regalo->user_regalo = $user_id;
                        //                 $regalo->user_recibio = $user_a_regalar;
                        //                 $regalo->save();
                        //             }

                        //         }

                        //     }
                        // }
                        $col += 1;
                }
            } else {
                var_dump('no hay usuario');
            }
        } else {
            var_dump('el monto es mayor al punto acumulado');
        }
        // var_dump('se sumo'.$acumulado);
        var_dump('--------'); die;
        return redirect('/transferencia');

    }