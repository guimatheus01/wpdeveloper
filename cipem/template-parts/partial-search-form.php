                            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                <input type="text" value="Presquisar" onblur="if(this.value == '') { this.value ='Presquisar'; }" onfocus="if(this.value =='Presquisar') { this.value = ''; }" type="search" name="s">
                                <label>
                                    <input type="submit" value="">
                                </label>
                            </form>