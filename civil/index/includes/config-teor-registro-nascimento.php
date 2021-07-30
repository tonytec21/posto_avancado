<?php 
$pdo = conectar();
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
function idade_civil_antigo($nascimento,$dataregistro){
  $data = explode("-",$nascimento);
  $registro = explode("-",$dataregistro);
  if (!isset($dataregistro)) {
  $registro = explode("-",date('Y-m-d'));
  }

  $ano = $data[0];
  $mes = $data[1];
  $dia = $data[2];

  $ano1 = $registro[0];
  $mes1 = $registro[1];
  $dia1 = $registro[2];



    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime( 0, 0, 0, $mes1, $dia1, $ano1);
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    return $idade;

}

function dataum($data){
$dataAno = $data;
if (substr($dataAno, -2) == '11') {
echo GExtenso::numero($dataAno)." onze";
}
elseif (substr($dataAno, -1) == '1') {
echo GExtenso::numero($dataAno)." um";
}
else {
  echo GExtenso::numero($dataAno);
}

}
 ?>
<?php $r = PESQUISA_ALL_ID('registro_nascimento_novo',$id);
  foreach ($r as $r ) :
  if (empty($r->DATANASCIMENTO)) {
    $r->DATANASCIMENTO = date('Y-m-d');
  }

    ?>
 <?php if ($r->TIPOASSENTO != 'ORDEM' && $r->TIPOASSENTO != 'UNIDADE_INTERLIGADA' ): ?> 
    <!--REGISTRO NASCIMENTO LIVRO BASICO #################################################################################################################--> 
                        

                        <p style="text-align: justify;">Ao(s)   

                          <?php 
                                $data = $r->DATAENTRADA ;
                                if (empty($r->DATAENTRADA)) {
                                $data = date('Y-m-d');
                                }
                                $novaData = explode("-", $data);

                                if ($novaData[2] == '01' || $novaData[2] == '1') {
                                  echo " Primeiro dia  ";
                                }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                                  echo " Dois dias ";
                                } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                                  echo " Três ";
                                } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                                  echo " Quatro dias ";
                                } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                                  echo " Cinco dias ";
                                } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                                  echo " Seis dias ";
                                } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                                  echo " Sete dias ";
                                } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                                  echo " Oito dias ";
                                } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                                  echo " Nove dias ";
                                } 
                                elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                                echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                                }
                                else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                                //Será exibido na tela a data: 16/02/2015
                                // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                                if ($novaData[1] == '01' || $novaData[1] == '1') {
                                  echo " de Janeiro de ";
                                }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                                  echo " de Fevereiro de ";
                                } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                                  echo " de Março de ";
                                } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                                  echo " de Abril de ";
                                } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                                  echo " de Maio de ";
                                } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                                  echo " de Junho de ";
                                } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                                  echo " de Julho de ";
                                } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                                  echo " de Agosto de ";
                                } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                                  echo " de Setembro de ";
                                } elseif ($novaData[1] == '10') {
                                  echo " de Outubro de ";
                                } elseif ($novaData[1] == '11') {
                                  echo " de Novembro de ";
                                } elseif ($novaData[1] == '12') {
                                  echo " de Dezembro de ";
                                } else {
                                  echo "Não definido";
                                }

                                  $udg = substr($novaData[0], 2,3);
                                  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                                   echo GExtenso::numero($novaData[0]).'  um';
                                  }
                                  else{
                                    echo GExtenso::numero($novaData[0]);
                                  }

                          ?> (<?=date('d/m/Y', strtotime($r->DATAENTRADA))?>), neste(a)


                          <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>


                          <span style="text-transform: capitalize;"><?=$w->strRazaoSocial?></span> Estado do Maranhão, <?php endforeach ?>   
                        <!--TIPOS DE DECLARANTES-->

                                <?php if ($r->QUALIDADEDECLARANTE =='PAI'): ?>
                                compareceu <?=mb_strtoupper($r->NOMEPAI)?>, Pai da criança e abaixo qualificado, apresentando a DNV nº <b> <?=$r->DNV?></b>,  e declarou que no dia 

                                <?php elseif ($r->QUALIDADEDECLARANTE =='MAE'): ?>
                                compareceu <?=mb_strtoupper($r->NOMEMAE)?>, Mãe da criança e abaixo qualificada, apresentando a DNV nº <b> <?=$r->DNV?></b>, e declarou que no dia
                                <?php elseif ($r->QUALIDADEDECLARANTE =='AMBOSPAI'): ?>
                                compareceram os pais do registrado, apresentando a DNV nº <b> <?=$r->DNV?></b>,  e declararam que no dia

                                <?php else : ?>
                                compareceu  

                                <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMEDECLARANTE)?></span>,
                            <?=strtolower($r->NACIONALIDADEDECLARANTE)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEDECLARANTE)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--  
                            <?php if ($r->ESTADOCIVILDECLARANTE == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILDECLARANTE == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILDECLARANTE == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILDECLARANTE == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILDECLARANTE == 'UN'): ?>
                            em união estável,
                            <?php elseif ($r->ESTADOCIVILDECLARANTE == 'SJ'): ?>
                            separado judicialmente,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAODECLARANTE)?>, portador do RG de número <?=$r->RGDECLARANTE?>/<?=$r->ORGAOEMISSORDECLARANTE?>, inscrito no CPF de número <?=$r->CPFDECLARANTE?>,  

                            <?php if ($r->DATANASCIMENTODECLARANTE!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTODECLARANTE ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTODECLARANTE))?>), 
                            <?php if ($r->DATANASCIMENTODECLARANTE!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTODECLARANTE,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECODECLARANTE)?>, <?=mb_strtolower($r->BAIRRODECLARANTE)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEDECLARANTE)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,



                                 apresentando a DNV nº <b> <?=$r->DNV?></b>, e declarou que no dia

                                <?php endif ?>


                                 <?php 

                                        $data = $r->DATANASCIMENTO ;
                                        $novaData = explode("-", $data);
                                        echo $novaData[2];
                                        /*
                                        if ($novaData[2] == '01' || $novaData[1] == '1') {
                                          echo " Um de  ";
                                        }elseif ($novaData[2] == '02' || $novaData[1] == '2') {
                                          echo " Dois de ";
                                        } elseif ($novaData[2] == '03' || $novaData[1] == '3') {
                                          echo " Três ";
                                        } elseif ($novaData[2] == '04' || $novaData[1] == '4') {
                                          echo " Quatro de ";
                                        } elseif ($novaData[2] == '05' || $novaData[1] == '5') {
                                          echo " Cinco de ";
                                        } elseif ($novaData[2] == '06' || $novaData[1] == '6') {
                                          echo " Seis de ";
                                        } elseif ($novaData[2] == '07' || $novaData[1] == '7') {
                                          echo " Sete de ";
                                        } elseif ($novaData[2] == '08' || $novaData[1] == '8') {
                                          echo " Oito de ";
                                        } elseif ($novaData[2] == '09' || $novaData[1] == '9') {
                                          echo " Nove de ";
                                        } else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                                        */
                                        //Será exibido na tela a data: 16/02/2015
                                        // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                                        if ($novaData[1] == '01' || $novaData[1] == '1') {
                                          echo " de Janeiro de ";
                                        }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                                          echo " de Fevereiro de ";
                                        } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                                          echo " de Março de ";
                                        } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                                          echo " de Abril de ";
                                        } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                                          echo " de Maio de ";
                                        } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                                          echo " de Junho de ";
                                        } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                                          echo " de Julho de ";
                                        } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                                          echo " de Agosto de ";
                                        } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                                          echo " de Setembro de ";
                                        } elseif ($novaData[1] == '10') {
                                          echo " de Outubro de ";
                                        } elseif ($novaData[1] == '11') {
                                          echo " de Novembro de ";
                                        } elseif ($novaData[1] == '12') {
                                          echo " de Dezembro de ";
                                        } else {
                                          echo "Não definido";
                                        }

                                        $udg = substr($novaData[0], 2,3);
                                        if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                                        echo GExtenso::numero($novaData[0]).'  um';
                                        }
                                        else{
                                        echo GExtenso::numero($novaData[0]);
                          }

                                  ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTO))?>),


                                as <?=$r->HORANASCIMENTO?> Horas, no(a) <span style="text-transform: capitalize;"><?=mb_strtolower($r->LOCALNASCIMENTO)?>, <?=mb_strtolower($r->ENDERECOLOCALNASCIMENTO)?></span>, em municipio de 

                          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach($c as $c):?>
                          <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                          <?php endforeach ?> nasceu uma criança do sexo 
                          <?php if ($r->SEXONASCIDO == 'M') :?>
                          Masculino,
                          <?php else: ?>  
                          Feminino,
                          <?php endif ?> com CPF de número <?=$r->CPFNASCIDO?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach($c as $c):?>
                          <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>
                          <?php endforeach ?> que recebeu o nome de: <b><?=mb_convert_case($r->NOMENASCIDO, MB_CASE_UPPER, "UTF-8")?></b>

                            <?php if ($r->SEXONASCIDO == 'M') :?>
                            Filho de
                            <?php else: ?>  
                            Filha de
                            <?php endif ?>
                          
                          
                            <!--QUALIFICACAO PAI------------------------------------------------------------------------------------------------->  
                            <?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
                            <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMEPAI)?></span>,
                            <?=strtolower($r->NACIONALIDADEPAI)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--  
                            <?php if ($r->ESTADOCIVILPAI == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILPAI == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILPAI == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILPAI == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILPAI == 'UN'): ?>
                            em união estável,
                            <?php elseif ($r->ESTADOCIVILPAI == 'SJ'): ?>
                            separado judicialmente,
                            <?php else: ?>

                            <?php endif ?>
                            -->

                            <?=mb_strtolower($r->PROFISSAOPAI)?>, portador do RG de número <?=$r->RGPAI?>/<?=$r->ORGAOEMISSORPAI?>, inscrito no CPF de número <?=$r->CPFPAI?>,  

                            <?php if ($r->DATANASCIMENTOPAI!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOPAI ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOPAI))?>),  
                            <?php if ($r->DATANASCIMENTOPAI!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOPAI,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOPAI)?>, <?=mb_strtolower($r->BAIRROPAI)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAI)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,   
                            <?php if ($r->PROCURADORPAI!=''): ?>
                              representado neste ato por <?=mb_strtoupper($r->PROCURADORPAI)?>, <?=$r->QUALIFICACAOPROCURADORPAI?>, 
                            <?php endif ?>
                            e de 
                            <?php endif ?>

                            <span style="text-transform: capitalize;font-weight: bold"> <?=mb_strtoupper($r->NOMEMAE)?></span>, <?=strtolower($r->NACIONALIDADEMAE)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?>
                        <!--
                            <?php if ($r->ESTADOCIVILMAE == 'CA'): ?>
                            casada,
                            <?php elseif ($r->ESTADOCIVILMAE == 'SO'): ?>
                            solteira,
                            <?php elseif ($r->ESTADOCIVILMAE == 'DI'): ?>
                            divorciada, 
                            <?php elseif ($r->ESTADOCIVILMAE == 'VI'): ?>
                            viúva,  
                            <?php elseif ($r->ESTADOCIVILMAE == 'UN'): ?>
                            em união estável,
                            <?php elseif ($r->ESTADOCIVILMAE == 'SJ'): ?>
                            separado judicialmente,
                            <?php else: ?>

                            <?php endif ?> -->

                            <?=mb_strtolower($r->PROFISSAOMAE)?>,  portadora do RG de número <?=$r->RGMAE?>/<?=$r->ORGAOEMISSORMAE?>, inscrita no CPF de número <?=$r->CPFMAE?>,

                            <?php if ($r->DATANASCIMENTOMAE!=''): ?>

                            nascida em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOMAE ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }



                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOMAE))?>),  
                            <?php endif ?>
                            <?php if ($r->DATANASCIMENTOMAE!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOMAE, $r->DATANASCIMENTO)?> anos de idade na ocasião do parto, e agora com com <?=idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATAENTRADA)?> anos de idade,
                            <?php endif ?> residente e domiciliada em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOMAE)?>, <?=mb_strtolower($r->BAIRROMAE)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAE)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>






















                              <!--QUALIFICACAO PAISOCIO-------------------------------------------------------------------------------------------------> 
                            <?php if ($r->NOMEPAISOCIO!='NULL' && $r->NOMEPAISOCIO!='' && $r->ROGOPAISOCIO!='PAIDEMENOR'):?>
                            <span style="font-weight: bold; text-transform: capitalize;">, <?=mb_strtoupper($r->NOMEPAISOCIO)?></span>,
                            <?=strtolower($r->NACIONALIDADEPAISOCIO)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAISOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--
                            <?php if ($r->ESTADOCIVILPAISOCIO == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'UN'): ?>
                            em união estável,
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'SJ'): ?>
                            separado judicialmente,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOPAISOCIO)?>, portador do RG de número <?=$r->RGPAISOCIO?>/<?=$r->ORGAOEMISSORPAISOCIO?>, inscrito no CPF de número <?=$r->CPFPAISOCIO?>,  

                            <?php if ($r->DATANASCIMENTOPAISOCIO!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOPAISOCIO ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOPAISOCIO))?>), 
                            <?php if ($r->DATANASCIMENTOPAISOCIO!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOPAISOCIO,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOPAISOCIO)?>, <?=mb_strtolower($r->BAIRROPAISOCIO)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAISOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,   

                            e de 
                            <?php endif ?>
                            <?php if ($r->NOMEMAESOCIO!='NULL' && $r->NOMEMAESOCIO!='' && $r->ROGOMAESOCIO!='MAEDEMENOR'):?>  
                            <span style="text-transform: capitalize;font-weight: bold"> <?=mb_strtoupper($r->NOMEMAESOCIO)?></span>, <?=strtolower($r->NACIONALIDADEMAESOCIO)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAESOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?>
                          <!--
                            <?php if ($r->ESTADOCIVILMAESOCIO == 'CA'): ?>
                            casada,
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'SO'): ?>
                            solteira,
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'DI'): ?>
                            divorciada, 
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'VI'): ?>
                            viúva,  
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'UN'): ?>
                            em união estável,
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'SJ'): ?>
                            separado judicialmente,
                            <?php else: ?>

                            <?php endif ?> -->

                            <?=mb_strtolower($r->PROFISSAOMAESOCIO)?>,  portadora do RG de número <?=$r->RGMAESOCIO?>/<?=$r->ORGAOEMISSORMAESOCIO?>, inscrita no CPF de número <?=$r->CPFMAESOCIO?>,

                            <?php if ($r->DATANASCIMENTOMAESOCIO!=''): ?>

                            nascida em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOMAESOCIO ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }



                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOMAESOCIO))?>), 
                            <?php endif ?>
                            <?php if ($r->DATANASCIMENTOMAESOCIO!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOMAESOCIO, $r->DATANASCIMENTO)?> anos de idade na ocasião do parto, e agora com com <?=idade_civil_antigo($r->DATANASCIMENTOMAESOCIO,$r->DATAENTRADA)?> anos de idade,
                            <?php endif ?> residente e domiciliada em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOMAESOCIO)?>, <?=mb_strtolower($r->BAIRROMAESOCIO)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAESOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>
                          <?php endif ?>



                          <?php if ($r->LUGARCASAMENTO!='' && $r->CARTORIOCASAMENTO!=''): ?>
                          Os pais da criança são casados entre si, o casamento foi feito em <?=$r->LUGARCASAMENTO?>, na cidade de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADECASAMENTO)); foreach($c as $c):?>
                          <?=$c->cidade?> (<?=$c->uf?>)
                          <?php endforeach ?>, no (a) Cartório <?=$r->CARTORIOCASAMENTO?>
                          <?php endif ?>
                          <?php if ($r->NOMEMATRICULAGEMEOS!=''): ?>
                            A criança possui irmão(s) gemeo(s), sendo eles, <?=$r->NOMEMATRICULAGEMEOS?>
                          <?php endif ?>

                          <span style="font-weight: bold;">
                          <?php if ($r->AVO1PATERNO!='' || $r->AVO2PATERNO!=''): ?>
                          . São seus avós paternos: 
                          <?php endif ?>
                          <?php if ($r->AVO1PATERNO!=''): ?>
                            <?=mb_strtoupper($r->AVO1PATERNO)?> e 
                          <?php endif ?>
                          <?php if ($r->AVO2PATERNO!=''): ?>
                            <?=mb_strtoupper($r->AVO2PATERNO)?>. 
                          <?php endif ?>
                          São seus avós maternos: <?=mb_strtoupper($r->AVO1MATERNO)?> e <?=mb_strtoupper($r->AVO2MATERNO)?>.
                          </span>

                          <span style="font-weight: bold;">
                          <?php if ($r->AVO1PATERNOSOCIO!='' || $r->AVO2PATERNOSOCIO!=''): ?>
                          
                          <?php endif ?>
                          <?php if ($r->AVO1PATERNOSOCIO!=''): ?>
                            <?=mb_strtoupper($r->AVO1PATERNOSOCIO)?> e 
                          <?php endif ?>
                          <?php if ($r->AVO2PATERNOSOCIO!=''): ?>
                            <?=mb_strtoupper($r->AVO2PATERNOSOCIO)?>. 
                          <?php endif ?>
                          <?php if ($r->AVO1MATERNOSOCIO!='' || $r->AVO2MATERNOSOCIO!=''): ?>
                          , <?=mb_strtoupper($r->AVO1MATERNOSOCIO)?> e <?=mb_strtoupper($r->AVO2MATERNOSOCIO)?>.
                        <?php endif ?>
                          </span>
                        
                        <?php if ($r->NOMETESTEMUNHA1!='' || $r->NOMETESTEMUNHA2!=''): ?>
  

                          São testemunhas do assento 
                          
                                <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA1)?></span>,
                            <?=strtolower($r->NACIONALIDADETESTEMUNHA1)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--
                            <?php if ($r->ESTADOCIVILTESTEMUNHA1 == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOTESTEMUNHA1)?>, portador do RG de número <?=$r->RGTESTEMUNHA1?>/<?=$r->ORGAOEMISSORTESTEMUNHA1?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA1?>,  

                            <?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOTESTEMUNHA1 ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA1))?>),  
                            <?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA1,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA1)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA1)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>

                          e    
                                <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA2)?></span>,
                            <?=strtolower($r->NACIONALIDADETESTEMUNHA2)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          
                          <!--  
                            <?php if ($r->ESTADOCIVILTESTEMUNHA2 == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOTESTEMUNHA2)?>, portador do RG de número <?=$r->RGTESTEMUNHA2?>/<?=$r->ORGAOEMISSORTESTEMUNHA2?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA2?>,  

                            <?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOTESTEMUNHA2 ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA2))?>),  
                            <?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA2,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA2)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA2)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>
                          


                          , que declaram sob as penas da lei conhecer a mãe e a existência da gravidez.

                        <?php endif ?>

                        <?php if ($r->TIPOLOCALNASCIMENTO == 'FORA_UNIDADE_SAUDE' && $r->TIPOASSENTO == 'COMUN'): ?>
                        OBS: Nascimento ocorrido (sem assistência médica, em residência, fora de unidade hospitalar ou fora de casa de saúde), Declaração de nascido vivo preenchida por este oficial e identificada pelo nº  <?=$r->DNV?>, que segue para o classificador ______________________________, assinada pelo(a) declarante. A declarante subscreve ciente que a prática do ato será comunicada ao juiz corregedor permanente desta serventia, isento de emolumentos. lido em voz alta e clara, achado conforme, segue o presente assinada pela declarante e duas testemunhas.
                        <?php endif ?>

                        <?php if ($r->RANI!=''): ?>
                           OBS: Registro de nascimento indígena, Nº RANI : <?=$r->RANI?>. 
                        <?php endif ?>

                        <?php if ($r->TIPOASSENTO == 'REGISTROT'): ?>
                        Observação: Registro Tardio feito conforme Art. 46 e seguintes da Lei 6.015 e Provimento Nº 28 do CNJ -
                        Conselho Nacional de Justiça.
                        <?php endif ?>

                        <?php if ($r->TIPOASSENTO == 'POSTO' && $r->TIPOLOCALNASCIMENTO == 'UNIDADE_SAUDE'): ?> 
                        Observação: Registro de Nascimento, feito em posto avançado de registro de nascimentos, administrado por esta serventia.
                        <?php endif ?>

                         Nada mais se declarou. Dou fé,
                        lido e achado conforme 

                          <?php if ($r->QUALIDADEDECLARANTE =='PAI'): ?>
                            assina o pai,
                          <?php elseif ($r->QUALIDADEDECLARANTE =='MAE'): ?>
                            assina a mãe,
                          <?php elseif ($r->QUALIDADEDECLARANTE =='AMBOSPAI'): ?>
                            assinam os pais do registrando,
                          <?php else : ?>
                          assina o declarante, 
                          <?php endif ?>


                        <?php if ($r->ROGOPAISOCIO == 'PAIDEMENOR'): 
                        $reppai = explode(",", $r->NOMEPAISOCIO); 
                          ?>
                          <span style="font-weight: bold">Observação: O pai é de menor de idade, estando acompanhado do sr(a) <?=$reppai[0]?> sendo o mesmo seu(a) <?=$reppai[1]?>. Que assina este termo.</span>
                        <?php endif ?>


                        <?php if ($r->ROGOMAESOCIO == 'MAEDEMENOR'): 
                        $repmae = explode(",", $r->NOMEMAESOCIO); 
                          ?>
                          <span style="font-weight: bold">Observação: A mãe é de menor de idade, estando acompanhado do sr(a) <?=$repmae[0]?> sendo o mesmo seu(a) <?=$repmae[1]?>. Que assina este termo.</span>
                        <?php endif ?>



                    






                         eu <?=mb_strtoupper($_SESSION['nome'])?>, <?=$_SESSION['funcao']?> digitei subscrevo e assino. Selo de Fiscalização: <?=$r->SELO?>.
                        (Registro isento de emolumentos). - Matrícula
                        da 1ª Via da Certidão: <?=$r->MATRICULA?><br>-------------------------------------------------------------------------------
                        <span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>

                        
                           </fieldset>
    <!--REGISTRO NASCIMENTO LIVRO BASICO #################################################################################################################-->
<?php endif ?>  
<?php if ($r->TIPOASSENTO == 'ORDEM'): ?>
            <p style="text-align: justify;">Ao(s)   

            <?php 
            $data = $r->DATAENTRADA ;
            if (empty($r->DATAENTRADA)) {
            $data = date('Y-m-d');
            }
            $novaData = explode("-", $data);

            if ($novaData[2] == '01' || $novaData[2] == '1') {
            echo " Primeiro dia  ";
            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
            echo " Dois dias ";
            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
            echo " Três ";
            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
            echo " Quatro dias ";
            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
            echo " Cinco dias ";
            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
            echo " Seis dias ";
            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
            echo " Sete dias ";
            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
            echo " Oito dias ";
            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
            echo " Nove dias ";
            } 
            elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
            }
            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
            //Será exibido na tela a data: 16/02/2015
            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
            if ($novaData[1] == '01' || $novaData[1] == '1') {
            echo " de Janeiro de ";
            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
            echo " de Fevereiro de ";
            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
            echo " de Março de ";
            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
            echo " de Abril de ";
            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
            echo " de Maio de ";
            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
            echo " de Junho de ";
            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
            echo " de Julho de ";
            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
            echo " de Agosto de ";
            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
            echo " de Setembro de ";
            } elseif ($novaData[1] == '10') {
            echo " de Outubro de ";
            } elseif ($novaData[1] == '11') {
            echo " de Novembro de ";
            } elseif ($novaData[1] == '12') {
            echo " de Dezembro de ";
            } else {
            echo "Não definido";
            }

            $udg = substr($novaData[0], 2,3);
            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
            echo GExtenso::numero($novaData[0]).'  um';
            }
            else{
            echo GExtenso::numero($novaData[0]);
            }

            ?> (<?=date('d/m/Y', strtotime($r->DATAENTRADA))?>), neste(a)


            <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>


            <span style="text-transform: capitalize;"><?=$w->strRazaoSocial?></span> Estado do Maranhão, <?php endforeach ?>, por mandato judicial expedido pelo exmo. Juiz <?=$r->JUIZMANDATO?>, do(a) <?=$r->VARAMANDATO?> em <?=date('d/m/Y', strtotime($r->DATAEXPEDICAOMANDATO))?> nº <?=$r->NUMEROMANDATO?>, por sentença datada de <?=date('d/m/Y', strtotime($r->DATASENTENCAMANDATO))?>, onde consta a DNV nº  <?=$r->DNV?>, procedi o registro de uma criança do sexo   <?php if ($r->SEXONASCIDO == 'M') :?>
            Masculino
            <?php else: ?>  
            Feminino
            <?php endif ?>, ocorrido aos 

            <?php //echo date('d/m/Y', strtotime($r->dataObito));

            $data = $r->DATANASCIMENTO ;
            $novaData = explode("-", $data);
            echo $novaData[2];
            /*
            if ($novaData[2] == '01' || $novaData[1] == '1') {
            echo " Um de  ";
            }elseif ($novaData[2] == '02' || $novaData[1] == '2') {
            echo " Dois de ";
            } elseif ($novaData[2] == '03' || $novaData[1] == '3') {
            echo " Três ";
            } elseif ($novaData[2] == '04' || $novaData[1] == '4') {
            echo " Quatro de ";
            } elseif ($novaData[2] == '05' || $novaData[1] == '5') {
            echo " Cinco de ";
            } elseif ($novaData[2] == '06' || $novaData[1] == '6') {
            echo " Seis de ";
            } elseif ($novaData[2] == '07' || $novaData[1] == '7') {
            echo " Sete de ";
            } elseif ($novaData[2] == '08' || $novaData[1] == '8') {
            echo " Oito de ";
            } elseif ($novaData[2] == '09' || $novaData[1] == '9') {
            echo " Nove de ";
            } else {echo  ucfirst(GExtenso::numero($novaData[2]));}
            */
            //Será exibido na tela a data: 16/02/2015
            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
            if ($novaData[1] == '01' || $novaData[1] == '1') {
            echo " de Janeiro de ";
            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
            echo " de Fevereiro de ";
            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
            echo " de Março de ";
            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
            echo " de Abril de ";
            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
            echo " de Maio de ";
            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
            echo " de Junho de ";
            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
            echo " de Julho de ";
            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
            echo " de Agosto de ";
            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
            echo " de Setembro de ";
            } elseif ($novaData[1] == '10') {
            echo " de Outubro de ";
            } elseif ($novaData[1] == '11') {
            echo " de Novembro de ";
            } elseif ($novaData[1] == '12') {
            echo " de Dezembro de ";
            } else {
            echo "Não definido";
            }

            $udg = substr($novaData[0], 2,3);
            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
            echo GExtenso::numero($novaData[0]).'  um';
            }
            else{
            echo GExtenso::numero($novaData[0]);
            }

            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTO))?>),


            as <?=$r->HORANASCIMENTO?> Horas, no(a) <span style="text-transform: capitalize;"><?=mb_strtolower($r->LOCALNASCIMENTO)?>, <?=mb_strtolower($r->ENDERECOLOCALNASCIMENTO)?></span>, em municipio de 

                          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach($c as $c):?>
                          <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                          <?php endforeach ?>  com CPF de número <?=$r->CPFNASCIDO?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach($c as $c):?>
                          <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>
                          <?php endforeach ?> que recebeu o nome de: <b><?=mb_convert_case($r->NOMENASCIDO, MB_CASE_UPPER, "UTF-8")?></b>

                            <?php if ($r->SEXONASCIDO == 'M') :?>
                            Filho de
                            <?php else: ?>  
                            Filha de
                            <?php endif ?>
                          
                          
                            <!--QUALIFICACAO PAI------------------------------------------------------------------------------------------------->  
                            <?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
                            <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMEPAI)?></span>,
                            <?=strtolower($r->NACIONALIDADEPAI)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                          <!--  
                            <?php endforeach ?> 
                            <?php if ($r->ESTADOCIVILPAI == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILPAI == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILPAI == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILPAI == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILPAI == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOPAI)?>, portador do RG de número <?=$r->RGPAI?>/<?=$r->ORGAOEMISSORPAI?>, inscrito no CPF de número <?=$r->CPFPAI?>,  

                            <?php if ($r->DATANASCIMENTOPAI!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOPAI ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOPAI))?>),  
                            <?php if ($r->DATANASCIMENTOPAI!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOPAI,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOPAI)?>, <?=mb_strtolower($r->BAIRROPAI)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAI)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,   
                            <?php if ($r->PROCURADORPAI!=''): ?>
                              representado neste ato por <?=mb_strtoupper($r->PROCURADORPAI)?>, <?=$r->QUALIFICACAOPROCURADORPAI?>, 
                            <?php endif ?>
                            e de 
                            <?php endif ?>

                            <span style="text-transform: capitalize;font-weight: bold"> <?=mb_strtoupper($r->NOMEMAE)?></span>, <?=strtolower($r->NACIONALIDADEMAE)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?>
                          <!--    
                            <?php if ($r->ESTADOCIVILMAE == 'CA'): ?>
                            casada,
                            <?php elseif ($r->ESTADOCIVILMAE == 'SO'): ?>
                            solteira,
                            <?php elseif ($r->ESTADOCIVILMAE == 'DI'): ?>
                            divorciada, 
                            <?php elseif ($r->ESTADOCIVILMAE == 'VI'): ?>
                            viúva,  
                            <?php elseif ($r->ESTADOCIVILMAE == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->

                            <?=mb_strtolower($r->PROFISSAOMAE)?>,  portadora do RG de número <?=$r->RGMAE?>/<?=$r->ORGAOEMISSORMAE?>, inscrita no CPF de número <?=$r->CPFMAE?>,

                            <?php if ($r->DATANASCIMENTOMAE!=''): ?>

                            nascida em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOMAE ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }



                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOMAE))?>),  
                            <?php endif ?>
                            <?php if ($r->DATANASCIMENTOMAE!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOMAE, $r->DATANASCIMENTO)?> anos de idade na ocasião do parto, e agora com com <?=idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATANASCIMENTO)?> anos de idade,
                            <?php endif ?> residente e domiciliada em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOMAE)?>, <?=mb_strtolower($r->BAIRROMAE)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAE)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>





                              <!--QUALIFICACAO PAISOCIO-------------------------------------------------------------------------------------------------> 
                            <?php if ($r->NOMEPAISOCIO!='NULL' && $r->NOMEPAISOCIO!=''):?>
                            <span style="font-weight: bold; text-transform: capitalize;">, <?=mb_strtoupper($r->NOMEPAISOCIO)?></span>,
                            <?=strtolower($r->NACIONALIDADEPAISOCIO)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAISOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--
                            <?php if ($r->ESTADOCIVILPAISOCIO == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'UN'): ?>
                            em união estável,
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'SJ'): ?>
                            separado judicialmente,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOPAISOCIO)?>, portador do RG de número <?=$r->RGPAISOCIO?>/<?=$r->ORGAOEMISSORPAISOCIO?>, inscrito no CPF de número <?=$r->CPFPAISOCIO?>,  

                            <?php if ($r->DATANASCIMENTOPAISOCIO!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOPAISOCIO ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOPAISOCIO))?>), 
                            <?php if ($r->DATANASCIMENTOPAISOCIO!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOPAISOCIO,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOPAISOCIO)?>, <?=mb_strtolower($r->BAIRROPAISOCIO)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAISOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,   

                            e de 
                            <?php endif ?>

                            <span style="text-transform: capitalize;font-weight: bold"> <?=mb_strtoupper($r->NOMEMAESOCIO)?></span>, <?=strtolower($r->NACIONALIDADEMAESOCIO)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAESOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?>
                          <!--    
                            <?php if ($r->ESTADOCIVILMAESOCIO == 'CA'): ?>
                            casada,
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'SO'): ?>
                            solteira,
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'DI'): ?>
                            divorciada, 
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'VI'): ?>
                            viúva,  
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'UN'): ?>
                            em união estável,
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'SJ'): ?>
                            separado judicialmente,
                            <?php else: ?>

                            <?php endif ?> -->

                            <?=mb_strtolower($r->PROFISSAOMAESOCIO)?>,  portadora do RG de número <?=$r->RGMAESOCIO?>/<?=$r->ORGAOEMISSORMAESOCIO?>, inscrita no CPF de número <?=$r->CPFMAESOCIO?>,

                            <?php if ($r->DATANASCIMENTOMAESOCIO!=''): ?>

                            nascida em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOMAESOCIO ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }



                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOMAESOCIO))?>), 
                            <?php endif ?>
                            <?php if ($r->DATANASCIMENTOMAESOCIO!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOMAESOCIO, $r->DATANASCIMENTO)?> anos de idade na ocasião do parto, e agora com com <?=idade_civil_antigo($r->DATANASCIMENTOMAESOCIO,$r->DATAENTRADA)?> anos de idade,
                            <?php endif ?> residente e domiciliada em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOMAESOCIO)?>, <?=mb_strtolower($r->BAIRROMAESOCIO)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAESOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>




                          <?php if ($r->LUGARCASAMENTO!='' && $r->CARTORIOCASAMENTO!=''): ?>
                          Os pais da criança são casados entre si, o casamento foi feito em <?=$r->LUGARCASAMENTO?>, na cidade de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADECASAMENTO)); foreach($c as $c):?>
                          <?=$c->cidade?> (<?=$c->uf?>)
                          <?php endforeach ?>, no (a) Cartório <?=$r->CARTORIOCASAMENTO?>
                          <?php endif ?>
                          <?php if ($r->NOMEMATRICULAGEMEOS!=''): ?>
                            A criança possui irmão(s) gemeo(s), sendo eles, <?=$r->NOMEMATRICULAGEMEOS?>
                          <?php endif ?>

                          <span style="font-weight: bold;">
                          <?php if ($r->AVO1PATERNO!='' || $r->AVO2PATERNO!=''): ?>
                          . São seus avós paternos: 
                          <?php endif ?>
                          <?php if ($r->AVO1PATERNO!=''): ?>
                            <?=mb_strtoupper($r->AVO1PATERNO)?> e 
                          <?php endif ?>
                          <?php if ($r->AVO2PATERNO!=''): ?>
                            <?=mb_strtoupper($r->AVO2PATERNO)?>. 
                          <?php endif ?>
                          São seus avós maternos: <?=mb_strtoupper($r->AVO1MATERNO)?> e <?=mb_strtoupper($r->AVO2MATERNO)?>.
                          </span>
                          <span style="font-weight: bold;">
                          <?php if ($r->AVO1PATERNOSOCIO!='' || $r->AVO2PATERNOSOCIO!=''): ?>
                          
                          <?php endif ?>
                          <?php if ($r->AVO1PATERNOSOCIO!=''): ?>
                            <?=mb_strtoupper($r->AVO1PATERNOSOCIO)?> e 
                          <?php endif ?>
                          <?php if ($r->AVO2PATERNOSOCIO!=''): ?>
                            <?=mb_strtoupper($r->AVO2PATERNOSOCIO)?>. 
                          <?php endif ?>
                          , <?=mb_strtoupper($r->AVO1MATERNOSOCIO)?> e <?=mb_strtoupper($r->AVO2MATERNOSOCIO)?>.
                          </span>
                        <?php if ($r->NOMETESTEMUNHA1!='' || $r->NOMETESTEMUNHA2!=''): ?>
  

                          São testemunhas do assento 
                          
                                <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA1)?></span>,
                            <?=strtolower($r->NACIONALIDADETESTEMUNHA1)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--
                            <?php if ($r->ESTADOCIVILTESTEMUNHA1 == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOTESTEMUNHA1)?>, portador do RG de número <?=$r->RGTESTEMUNHA1?>/<?=$r->ORGAOEMISSORTESTEMUNHA1?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA1?>,  

                            <?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOTESTEMUNHA1 ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA1))?>),  
                            <?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA1,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA1)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA1)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>

                          e    
                                <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA2)?></span>,
                            <?=strtolower($r->NACIONALIDADETESTEMUNHA2)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--
                            <?php if ($r->ESTADOCIVILTESTEMUNHA2 == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOTESTEMUNHA2)?>, portador do RG de número <?=$r->RGTESTEMUNHA2?>/<?=$r->ORGAOEMISSORTESTEMUNHA2?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA2?>,  

                            <?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOTESTEMUNHA2 ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA2))?>),  
                            <?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA2,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA2)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA2)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>
                          


                          , que declaram sob as penas da lei conhecer a mãe e a existência da gravidez.

                        <?php endif ?>

                        <?php if ($r->TIPOLOCALNASCIMENTO == 'FORA_UNIDADE_SAUDE' && $r->TIPOASSENTO == 'COMUN'): ?>
                        OBS: Nascimento ocorrido (sem assistência médica, em residência, fora de unidade hospitalar ou fora de casa de saúde), Declaração de nascido vivo preenchida por este oficial e identificada pelo nº  <?=$r->DNV?>, que segue para o classificador ______________________________, assinada pelo(a) declarante. A declarante subscreve ciente que a prática do ato será comunicada ao juiz corregedor permanente desta serventia, isento de emolumentos. lido em voz alta e clara, achado conforme, segue o presente assinada pela declarante e duas testemunhas.
                        <?php endif ?>

                        <?php if ($r->RANI!=''): ?>
                           OBS: Registro de nascimento indígena, Nº RANI : <?=$r->RANI?>. 
                        <?php endif ?>

                        <?php if ($r->TIPOASSENTO == 'REGISTROT'): ?>
                        Observação: Registro Tardio feito conforme Art. 46 e seguintes da Lei 6.015 e Provimento Nº 28 do CNJ -
                        Conselho Nacional de Justiça.
                        <?php endif ?>

                        <?php if ($r->TIPOASSENTO == 'POSTO' && $r->TIPOLOCALNASCIMENTO == 'UNIDADE_SAUDE'): ?> 
                        Observação: Registro de Nascimento, feito em posto avançado de registro de nascimentos, administrado por esta serventia.
                        <?php endif ?>

                         Nada mais se declarou. Dou fé,
                        lido e achado conforme 

                          <?php if ($r->QUALIDADEDECLARANTE =='PAI'): ?>
                            assina o pai,
                          <?php elseif ($r->QUALIDADEDECLARANTE =='MAE'): ?>
                            assina a mãe,
                          <?php elseif ($r->QUALIDADEDECLARANTE =='AMBOSPAI'): ?>
                            assinam os pais do registrando,
                          <?php else : ?>
                          assina o declarante, 
                          <?php endif ?>


                        <?php if ($r->ROGOPAISOCIO == 'PAIDEMENOR'): 
                        $reppai = explode(",", $r->NOMEPAISOCIO); 
                          ?>
                          <span style="font-weight: bold">Observação: O pai é de menor de idade, estando acompanhado do sr(a) <?=$reppai[0]?> sendo o mesmo seu(a) <?=$reppai[1]?>. Que assina este termo.</span>
                        <?php endif ?>


                        <?php if ($r->ROGOMAESOCIO == 'MAEDEMENOR'): 
                        $repmae = explode(",", $r->NOMEMAESOCIO); 
                          ?>
                          <span style="font-weight: bold">Observação: A mãe é de menor de idade, estando acompanhado do sr(a) <?=$repmae[0]?> sendo o mesmo seu(a) <?=$repmae[1]?>. Que assina este termo.</span>
                        <?php endif ?>
                         eu <?=mb_strtoupper($_SESSION['nome'])?>, <?=$_SESSION['funcao']?> digitei subscrevo e assino. Selo de Fiscalização: <?=$r->SELO?>.
                        (Registro isento de emolumentos). - Matrícula
                        da 1ª Via da Certidão: <?=$r->MATRICULA?><br>-------------------------------------------------------------------------------
                        <span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>

                        
                           </fieldset>
<?php endif ?>
<?php if ($r->TIPOASSENTO == 'UNIDADE_INTERLIGADA'): ?>
            <p style="text-align: justify;">Ao(s)   

            <?php 
            $data = $r->DATAENTRADA ;
            if (empty($r->DATAENTRADA)) {
            $data = date('Y-m-d');
            }
            $novaData = explode("-", $data);

            if ($novaData[2] == '01' || $novaData[2] == '1') {
            echo " Primeiro dia  ";
            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
            echo " Dois dias ";
            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
            echo " Três ";
            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
            echo " Quatro dias ";
            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
            echo " Cinco dias ";
            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
            echo " Seis dias ";
            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
            echo " Sete dias ";
            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
            echo " Oito dias ";
            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
            echo " Nove dias ";
            } 
            elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
            }
            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
            //Será exibido na tela a data: 16/02/2015
            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
            if ($novaData[1] == '01' || $novaData[1] == '1') {
            echo " de Janeiro de ";
            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
            echo " de Fevereiro de ";
            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
            echo " de Março de ";
            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
            echo " de Abril de ";
            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
            echo " de Maio de ";
            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
            echo " de Junho de ";
            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
            echo " de Julho de ";
            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
            echo " de Agosto de ";
            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
            echo " de Setembro de ";
            } elseif ($novaData[1] == '10') {
            echo " de Outubro de ";
            } elseif ($novaData[1] == '11') {
            echo " de Novembro de ";
            } elseif ($novaData[1] == '12') {
            echo " de Dezembro de ";
            } else {
            echo "Não definido";
            }

            $udg = substr($novaData[0], 2,3);
            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
            echo GExtenso::numero($novaData[0]).'  um';
            }
            else{
            echo GExtenso::numero($novaData[0]);
            }

            ?> (<?=date('d/m/Y', strtotime($r->DATAENTRADA))?>), neste(a)


            <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>


            <span style="text-transform: capitalize;"><?=$w->strRazaoSocial?></span> Estado do Maranhão, <?php endforeach ?> por solicitação recebida através da plataforma de unidade interligada na Central de Registro Civil Nacional(CRC), onde consta a DNV nº  <?=$r->DNV?>, procedi o registro de uma criança do sexo  <?php if ($r->SEXONASCIDO == 'M') :?>
            Masculino
            <?php else: ?>  
            Feminino
            <?php endif ?>, ocorrido aos 

            <?php //echo date('d/m/Y', strtotime($r->dataObito));

            $data = $r->DATANASCIMENTO ;
            $novaData = explode("-", $data);
            echo $novaData[2];
            /*
            if ($novaData[2] == '01' || $novaData[1] == '1') {
            echo " Um de  ";
            }elseif ($novaData[2] == '02' || $novaData[1] == '2') {
            echo " Dois de ";
            } elseif ($novaData[2] == '03' || $novaData[1] == '3') {
            echo " Três ";
            } elseif ($novaData[2] == '04' || $novaData[1] == '4') {
            echo " Quatro de ";
            } elseif ($novaData[2] == '05' || $novaData[1] == '5') {
            echo " Cinco de ";
            } elseif ($novaData[2] == '06' || $novaData[1] == '6') {
            echo " Seis de ";
            } elseif ($novaData[2] == '07' || $novaData[1] == '7') {
            echo " Sete de ";
            } elseif ($novaData[2] == '08' || $novaData[1] == '8') {
            echo " Oito de ";
            } elseif ($novaData[2] == '09' || $novaData[1] == '9') {
            echo " Nove de ";
            } else {echo  ucfirst(GExtenso::numero($novaData[2]));}
            */
            //Será exibido na tela a data: 16/02/2015
            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
            if ($novaData[1] == '01' || $novaData[1] == '1') {
            echo " de Janeiro de ";
            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
            echo " de Fevereiro de ";
            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
            echo " de Março de ";
            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
            echo " de Abril de ";
            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
            echo " de Maio de ";
            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
            echo " de Junho de ";
            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
            echo " de Julho de ";
            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
            echo " de Agosto de ";
            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
            echo " de Setembro de ";
            } elseif ($novaData[1] == '10') {
            echo " de Outubro de ";
            } elseif ($novaData[1] == '11') {
            echo " de Novembro de ";
            } elseif ($novaData[1] == '12') {
            echo " de Dezembro de ";
            } else {
            echo "Não definido";
            }

            $udg = substr($novaData[0], 2,3);
            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
            echo GExtenso::numero($novaData[0]).'  um';
            }
            else{
            echo GExtenso::numero($novaData[0]);
            }

            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTO))?>),


            as <?=$r->HORANASCIMENTO?> Horas, no(a) <span style="text-transform: capitalize;"><?=mb_strtolower($r->LOCALNASCIMENTO)?>, <?=mb_strtolower($r->ENDERECOLOCALNASCIMENTO)?></span>, em municipio de 

                          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach($c as $c):?>
                          <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                          <?php endforeach ?>  com CPF de número <?=$r->CPFNASCIDO?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach($c as $c):?>
                          <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>
                          <?php endforeach ?> que recebeu o nome de: <b><?=mb_convert_case($r->NOMENASCIDO, MB_CASE_UPPER, "UTF-8")?></b>

                            <?php if ($r->SEXONASCIDO == 'M') :?>
                            Filho de
                            <?php else: ?>  
                            Filha de
                            <?php endif ?>
                          
                          
                            <!--QUALIFICACAO PAI------------------------------------------------------------------------------------------------->  
                            <?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
                            <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMEPAI)?></span>,
                            <?=strtolower($r->NACIONALIDADEPAI)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                          <!--  
                            <?php endforeach ?> 
                            <?php if ($r->ESTADOCIVILPAI == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILPAI == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILPAI == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILPAI == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILPAI == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOPAI)?>, portador do RG de número <?=$r->RGPAI?>/<?=$r->ORGAOEMISSORPAI?>, inscrito no CPF de número <?=$r->CPFPAI?>,  

                            <?php if ($r->DATANASCIMENTOPAI!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOPAI ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOPAI))?>),  
                            <?php if ($r->DATANASCIMENTOPAI!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOPAI,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOPAI)?>, <?=mb_strtolower($r->BAIRROPAI)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAI)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,   
                            <?php if ($r->PROCURADORPAI!=''): ?>
                              representado neste ato por <?=mb_strtoupper($r->PROCURADORPAI)?>, <?=$r->QUALIFICACAOPROCURADORPAI?>, 
                            <?php endif ?>
                            e de 
                            <?php endif ?>

                            <span style="text-transform: capitalize;font-weight: bold"> <?=mb_strtoupper($r->NOMEMAE)?></span>, <?=strtolower($r->NACIONALIDADEMAE)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?>
                          <!--    
                            <?php if ($r->ESTADOCIVILMAE == 'CA'): ?>
                            casada,
                            <?php elseif ($r->ESTADOCIVILMAE == 'SO'): ?>
                            solteira,
                            <?php elseif ($r->ESTADOCIVILMAE == 'DI'): ?>
                            divorciada, 
                            <?php elseif ($r->ESTADOCIVILMAE == 'VI'): ?>
                            viúva,  
                            <?php elseif ($r->ESTADOCIVILMAE == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->

                            <?=mb_strtolower($r->PROFISSAOMAE)?>,  portadora do RG de número <?=$r->RGMAE?>/<?=$r->ORGAOEMISSORMAE?>, inscrita no CPF de número <?=$r->CPFMAE?>,

                            <?php if ($r->DATANASCIMENTOMAE!=''): ?>

                            nascida em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOMAE ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }



                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOMAE))?>),  
                            <?php endif ?>
                            <?php if ($r->DATANASCIMENTOMAE!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOMAE, $r->DATANASCIMENTO)?> anos de idade na ocasião do parto, e agora com com <?=idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATANASCIMENTO)?> anos de idade,
                            <?php endif ?> residente e domiciliada em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOMAE)?>, <?=mb_strtolower($r->BAIRROMAE)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAE)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>





                              <!--QUALIFICACAO PAISOCIO-------------------------------------------------------------------------------------------------> 
                            <?php if ($r->NOMEPAISOCIO!='NULL' && $r->NOMEPAISOCIO!=''):?>
                            <span style="font-weight: bold; text-transform: capitalize;">, <?=mb_strtoupper($r->NOMEPAISOCIO)?></span>,
                            <?=strtolower($r->NACIONALIDADEPAISOCIO)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAISOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--
                            <?php if ($r->ESTADOCIVILPAISOCIO == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'UN'): ?>
                            em união estável,
                            <?php elseif ($r->ESTADOCIVILPAISOCIO == 'SJ'): ?>
                            separado judicialmente,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOPAISOCIO)?>, portador do RG de número <?=$r->RGPAISOCIO?>/<?=$r->ORGAOEMISSORPAISOCIO?>, inscrito no CPF de número <?=$r->CPFPAISOCIO?>,  

                            <?php if ($r->DATANASCIMENTOPAISOCIO!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOPAISOCIO ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOPAISOCIO))?>), 
                            <?php if ($r->DATANASCIMENTOPAISOCIO!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOPAISOCIO,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOPAISOCIO)?>, <?=mb_strtolower($r->BAIRROPAISOCIO)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAISOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,   

                            e de 
                            <?php endif ?>

                            <span style="text-transform: capitalize;font-weight: bold"> <?=mb_strtoupper($r->NOMEMAESOCIO)?></span>, <?=strtolower($r->NACIONALIDADEMAESOCIO)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAESOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?>
                          <!--    
                            <?php if ($r->ESTADOCIVILMAESOCIO == 'CA'): ?>
                            casada,
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'SO'): ?>
                            solteira,
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'DI'): ?>
                            divorciada, 
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'VI'): ?>
                            viúva,  
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'UN'): ?>
                            em união estável,
                            <?php elseif ($r->ESTADOCIVILMAESOCIO == 'SJ'): ?>
                            separado judicialmente,
                            <?php else: ?>

                            <?php endif ?> -->

                            <?=mb_strtolower($r->PROFISSAOMAESOCIO)?>,  portadora do RG de número <?=$r->RGMAESOCIO?>/<?=$r->ORGAOEMISSORMAESOCIO?>, inscrita no CPF de número <?=$r->CPFMAESOCIO?>,

                            <?php if ($r->DATANASCIMENTOMAESOCIO!=''): ?>

                            nascida em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOMAESOCIO ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }



                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOMAESOCIO))?>), 
                            <?php endif ?>
                            <?php if ($r->DATANASCIMENTOMAESOCIO!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOMAESOCIO, $r->DATANASCIMENTO)?> anos de idade na ocasião do parto, e agora com com <?=idade_civil_antigo($r->DATANASCIMENTOMAESOCIO,$r->DATAENTRADA)?> anos de idade,
                            <?php endif ?> residente e domiciliada em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOMAESOCIO)?>, <?=mb_strtolower($r->BAIRROMAESOCIO)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAESOCIO)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>




                          <?php if ($r->LUGARCASAMENTO!='' && $r->CARTORIOCASAMENTO!=''): ?>
                          Os pais da criança são casados entre si, o casamento foi feito em <?=$r->LUGARCASAMENTO?>, na cidade de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADECASAMENTO)); foreach($c as $c):?>
                          <?=$c->cidade?> (<?=$c->uf?>)
                          <?php endforeach ?>, no (a) Cartório <?=$r->CARTORIOCASAMENTO?>
                          <?php endif ?>
                          <?php if ($r->NOMEMATRICULAGEMEOS!=''): ?>
                            A criança possui irmão(s) gemeo(s), sendo eles, <?=$r->NOMEMATRICULAGEMEOS?>
                          <?php endif ?>

                          <span style="font-weight: bold;">
                          <?php if ($r->AVO1PATERNO!='' || $r->AVO2PATERNO!=''): ?>
                          . São seus avós paternos: 
                          <?php endif ?>
                          <?php if ($r->AVO1PATERNO!=''): ?>
                            <?=mb_strtoupper($r->AVO1PATERNO)?> e 
                          <?php endif ?>
                          <?php if ($r->AVO2PATERNO!=''): ?>
                            <?=mb_strtoupper($r->AVO2PATERNO)?>. 
                          <?php endif ?>
                          São seus avós maternos: <?=mb_strtoupper($r->AVO1MATERNO)?> e <?=mb_strtoupper($r->AVO2MATERNO)?>.
                          </span>
                          <span style="font-weight: bold;">
                          <?php if ($r->AVO1PATERNOSOCIO!='' || $r->AVO2PATERNOSOCIO!=''): ?>
                          
                          <?php endif ?>
                          <?php if ($r->AVO1PATERNOSOCIO!=''): ?>
                            <?=mb_strtoupper($r->AVO1PATERNOSOCIO)?> e 
                          <?php endif ?>
                          <?php if ($r->AVO2PATERNOSOCIO!=''): ?>
                            <?=mb_strtoupper($r->AVO2PATERNOSOCIO)?>. 
                          <?php endif ?>
                          , <?=mb_strtoupper($r->AVO1MATERNOSOCIO)?> e <?=mb_strtoupper($r->AVO2MATERNOSOCIO)?>.
                          </span>
                        <?php if ($r->NOMETESTEMUNHA1!='' || $r->NOMETESTEMUNHA2!=''): ?>
  

                          São testemunhas do assento 
                          
                                <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA1)?></span>,
                            <?=strtolower($r->NACIONALIDADETESTEMUNHA1)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--
                            <?php if ($r->ESTADOCIVILTESTEMUNHA1 == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOTESTEMUNHA1)?>, portador do RG de número <?=$r->RGTESTEMUNHA1?>/<?=$r->ORGAOEMISSORTESTEMUNHA1?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA1?>,  

                            <?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOTESTEMUNHA1 ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA1))?>),  
                            <?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA1,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA1)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA1)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>

                          e    
                                <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA2)?></span>,
                            <?=strtolower($r->NACIONALIDADETESTEMUNHA2)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
                            <?php endforeach ?> 
                          <!--
                            <?php if ($r->ESTADOCIVILTESTEMUNHA2 == 'CA'): ?>
                            casado(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'SO'): ?>
                            solteiro(a),
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'DI'): ?>
                            divorciado(a),  
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'VI'): ?>
                            viúvo(a), 
                            <?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'UN'): ?>
                            em união estável,
                            <?php else: ?>

                            <?php endif ?> -->
                            
                            <?=mb_strtolower($r->PROFISSAOTESTEMUNHA2)?>, portador do RG de número <?=$r->RGTESTEMUNHA2?>/<?=$r->ORGAOEMISSORTESTEMUNHA2?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA2?>,  

                            <?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>


                            nascido em
                            <?php //echo date('d/m/Y', strtotime($r->dataObito));

                            $data = $r->DATANASCIMENTOTESTEMUNHA2 ;
                            $novaData = explode("-", $data);

                            if ($novaData[2] == '01' || $novaData[2] == '1') {
                            echo " Primeiro   ";
                            }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
                            echo " Dois  ";
                            } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
                            echo " Três ";
                            } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
                            echo " Quatro  ";
                            } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
                            echo " Cinco  ";
                            } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
                            echo " Seis  ";
                            } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
                            echo " Sete  ";
                            } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
                            echo " Oito  ";
                            } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
                            echo " Nove  ";
                            } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
                            echo  ucfirst(GExtenso::numero($novaData[2])).'um';
                            }
                            else {echo  ucfirst(GExtenso::numero($novaData[2]));}
                            //Será exibido na tela a data: 16/02/2015
                            // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
                            if ($novaData[1] == '01' || $novaData[1] == '1') {
                            echo " de Janeiro de ";
                            }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
                            echo " de Fevereiro de ";
                            } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
                            echo " de Março de ";
                            } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
                            echo " de Abril de ";
                            } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
                            echo " de Maio de ";
                            } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
                            echo " de Junho de ";
                            } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
                            echo " de Julho de ";
                            } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
                            echo " de Agosto de ";
                            } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
                            echo " de Setembro de ";
                            } elseif ($novaData[1] == '10') {
                            echo " de Outubro de ";
                            } elseif ($novaData[1] == '11') {
                            echo " de Novembro de ";
                            } elseif ($novaData[1] == '12') {
                            echo " de Dezembro de ";
                            } else {
                            echo "Não definido";
                            }
                            $udg = substr($novaData[0], 2,3);
                            if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
                            echo GExtenso::numero($novaData[0]).'  um';
                            }
                            else{
                            echo GExtenso::numero($novaData[0]);
                            }


                            ?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA2))?>),  
                            <?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
                            com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA2,$r->DATANASCIMENTO)?> anos de idade, 
                            <?php endif ?><?php endif ?>
                            residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA2)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA2)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
                            <span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>
                          


                          , que declaram sob as penas da lei conhecer a mãe e a existência da gravidez.

                        <?php endif ?>

                        <?php if ($r->TIPOLOCALNASCIMENTO == 'FORA_UNIDADE_SAUDE' && $r->TIPOASSENTO == 'COMUN'): ?>
                        OBS: Nascimento ocorrido (sem assistência médica, em residência, fora de unidade hospitalar ou fora de casa de saúde), Declaração de nascido vivo preenchida por este oficial e identificada pelo nº  <?=$r->DNV?>, que segue para o classificador ______________________________, assinada pelo(a) declarante. A declarante subscreve ciente que a prática do ato será comunicada ao juiz corregedor permanente desta serventia, isento de emolumentos. lido em voz alta e clara, achado conforme, segue o presente assinada pela declarante e duas testemunhas.
                        <?php endif ?>

                        <?php if ($r->RANI!=''): ?>
                           OBS: Registro de nascimento indígena, Nº RANI : <?=$r->RANI?>. 
                        <?php endif ?>

                        <?php if ($r->TIPOASSENTO == 'REGISTROT'): ?>
                        Observação: Registro Tardio feito conforme Art. 46 e seguintes da Lei 6.015 e Provimento Nº 28 do CNJ -
                        Conselho Nacional de Justiça.
                        <?php endif ?>

                         Nada mais se declarou. Dou fé,
                        lido e achado conforme, Declaração de opção de Registro na Unidade Interligada, assinada pelo declarante e arquivada nesta serventia.


                        
                         eu <?=mb_strtoupper($_SESSION['nome'])?>, <?=$_SESSION['funcao']?> digitei subscrevo e assino. Selo de Fiscalização: <?=$r->SELO?>.
                        (Registro isento de emolumentos). - Matrícula
                        da 1ª Via da Certidão: <?=$r->MATRICULA?><br>-------------------------------------------------------------------------------
                        <span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>

                        
                           </fieldset>
<?php endif ?>
<?php endforeach; ?>