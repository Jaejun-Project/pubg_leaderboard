<?php
class statFunc{

	// public const KDRAING = 0;
	// public const WINRATIO = 1;
	// public const TIMESURVIED = 2;
	// public const ROUNDPLAYED = 3;
	// public const WIN = 4;
	// public const TOPTEN = 6;
	// public const LOSSES = 8;
	// public const AVGDMG =  12;
	// public const HEADRATIO =  27;
	// public const RATING =  9;
	

	
	protected $killrating;
	protected $winratio;
	protected $timesurvied;
	protected $roundplayed;
	protected $win;
	protected $topten;
	protected $losses;
	protected $avgdmg;
	protected $headratio;
	protected $rating;
	protected $mode;
	protected $region;

	  public function __construct( $stats) {

    	$this->killrating = $stats['stats'][0]["displayValue"];
    	
    	$this->winratio = $stats['stats'][1]["displayValue"];

    	$this->timesurvied = $stats['stats'][2]["displayValue"];
    	$this->roundplayed = $stats['stats'][3]["displayValue"];

    	$this->win = $stats['stats'][4]["displayValue"];
    	$this->topten = $stats['stats'][6]["displayValue"];

    	$this->losses = $stats['stats'][8]["displayValue"];
    	$this->avgdmg = $stats['stats'][12]["displayValue"];

    	$this->headratio = $stats['stats'][27]["displayValue"];
    	$this->rating = $stats['stats'][9]["displayValue"];

    	$this->mode = $stats['mode'];
    	$this->region =$stats['region'];

    }
    public function getMode(){
    	return $this->mode;
    }
    public function getRegion(){
    	return $this->region;
    }
    public function getKillRatio(){
    	return $this->killrating;
    }
	public function getWinRatio(){
    	return $this->winratio;
    }
     public function getTimeSurvied(){
    	return $this->timesurvied;
    }
     public function getRoundPlayed(){
    	return $this->roundplayed;
    }
     public function getWin(){
    	return $this->win;
    }
     public function getTopTen(){
    	return $this->topten;
    }
     public function getLosses(){
    	return $this->losses;
    }
     public function getAvgDmg(){
    	return $this->avgdmg;
    }
     public function getHeadRatio(){
    	return $this->headratio;
    }
     public function getRating(){
    	return $this->rating;
    }


}
?>