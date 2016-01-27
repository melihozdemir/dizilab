<?php

class Srs
{
    protected $CI = null;
    function __construct()
    {
    	$this->CI = &get_instance();
    }
    public function get_Series($permalink)
    {
        if ($data = $this->CI->series_model->get_Series($permalink))
		{
            $det1 = $data[0];
            return $det1;
        }
        return false;
    }
	function get_episodes($series_id,$seasons= FALSE)
	{
        if($seasons)
		{
            foreach($seasons as $key => $season)
			{
                $data[$season->id] = array();
            }
        }
        if($episodes = $this->CI->series_model->get_episodes($series_id))
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