<?php echo $this->Session->flash('auth'); ?>


<?php
    echo $this->Form->create('User', array('class' => 'plain'));
    echo $this->Form->inputs(
                array(
                    'legend' => 'Login', 
                    'username',
                    'password'
                )
            );
    echo $this->Form->end('Login');
?>
<p><?php //echo $this->Html->link('Forgot Password ?', array('action' => 'forgot')); ?></p>