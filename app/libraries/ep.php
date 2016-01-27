<?php

class Ep
{
    protected $CI = null;
    function __construct()
    {
    	$this->CI = &get_instance();
    }
    public function get_Episode($permalink,$season,$episode)
    {
        if ($data = $this->CI->episode_model->get_Episode($permalink,$season,$episode))
		{
            $det2 = $data[0];
            if(!existCookie('view_ep', $det2['id']))
			{
                if($this->CI->episode_model->_Activity($det2['id'],'view_ep')) insertCookie('view_ep', $det2['id']); 
            }
            return $det2;
        }
        return false;
    }
	function get_episodes($series_id,$seasons= FALSE)
	{
        if($seasons)
		{
            foreach($seasons as $key => $season)
			{
                $data[$season->season] = array();
            }
        }
        if($episodes = $this->CI->episode_model->get_episodes($series_id))
		{
            if($seasons)
			{
                foreach($episodes as $episode)
				{
                    $data[$episode['season']][] = $episode;
                }
                return $data;
            }
            return $episodes;
        }
        return FALSE;
    }   
}