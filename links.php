<div class="row clearfix" style="background: ; min-width: 100%; margin-left: -4%; padding-left: 1%; min-height: 150%;">
<br/><br/>
<h5>LINKS ÚTEIS:</h5>
<legend></legend>
</div>
<div class="row clearfix" style="margin-left: -4%!important;">
<!-- CRC NACIONAL -->
<?php $r = PESQUISA_ALL('cadastroserventia'); foreach ($r as $r ):?>
                    <?php if ($r->checkboxCivil =='S') {
                    echo "
<div class='col-lg-2 col-md-3 col-sm-6 col-xs-12 samobile_tony'>
  <a href='https://sistema.registrocivil.org.br/' target='_blank' title='CRC NACIONAL'>
                                <div class='info-boxhome bg-crc' style='cursor:pointer'>
                                  <div class='icon_Tony'>
                                            
<img src='images/CRC_nacional.png'/>
                                          <div class='content'>
                                      <div class='text-center' style='margin-top: -20px; margin-bottom: 10px'></div>
                                  </div>
                                </div>

</div>
</a>
</div>
          ";
          }else {
          echo "";
          }
          ?>
          <?php endforeach ?>

<!-- CONSULTAR SELO (SAUIN) -->
<div class='col-lg-2 col-md-3 col-sm-6 col-xs-12 samobile_tony'>
  <a href="https://selo.tjma.jus.br/" target="_blank" title='CONSULTAR SELO'>
                                <div class="info-boxhome bg-selador" style="cursor:pointer">
                                  <div class="icon_Tony">
                                            
<img src="images/Consultar Selo.png"/>
                                          <div class="content">
                                      <div class="text-center" style="margin-top: -20px; margin-bottom: 10px"></div>
                                  </div>
                                </div>

</div>
</a>
</div>

<!-- TRIBUNAL DE JUSTIÇA DO MARANHÃO (TJMA) -->
<div class='col-lg-2 col-md-3 col-sm-6 col-xs-12 samobile_tony'>
  <a href="http://www.tjma.jus.br/" target="_blank" title='TJ/MA'>
                                <div class="info-boxhome bg-tjma" style="cursor:pointer">
                                  <div class="icon_Tony">
                                            
<img src="images/TJMA.png"/>
                                          <div class="content">
                                      <div class="text-center" style="margin-top: -20px; margin-bottom: 10px"></div>
                                  </div>
                                </div>

</div>
</a>
</div>

<!-- WHATSAPP WEB -->
<div class='col-lg-2 col-md-3 col-sm-6 col-xs-12 samobile_tony'>
  <a href="https://web.whatsapp.com/" target="_blank" title='WHATSAPP WEB'>
                                <div class="info-boxhome bg-whatsapp" style="cursor:pointer">
                                  <div class="icon_Tony">
                                            
<img src="images/whatsapp.png"/>
                                          <div class="content">
                                      <div class="text-center" style="margin-top: -20px; margin-bottom: 10px"></div>
                                  </div>
                                </div>

                                
</div>
</a>
</div>

</div>