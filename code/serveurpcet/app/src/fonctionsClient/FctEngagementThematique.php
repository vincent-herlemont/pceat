<?php
use RedBean_Facade as R;
class FctEngagementThematique {
	
	public static function formeEngagementThematiqueArray($engagementThematique){
		$engagement = array();
		$engagement['id'] = $engagementThematique->id;
		$engagement['code_engagement_thematique'] = $engagementThematique->code_engagement_thematique;
		$engagement['nom_engagement_thematique'] = $engagementThematique->nom_engagement_thematique;
		return $engagement;
	}
}
?>