<?php
if ( !$this->session->userdata('logged_in'))
{
  redirect(site_url().'user/login');
}

?>

<?php $this->load->view('template_head'); ?>
<?php $this->load->view('template_body',$page); ?>
