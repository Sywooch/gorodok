<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 06.08.2015
 * Time: 12:26
 */
use yii\helpers\Url;
use frontend\widgets\CategJob;
use frontend\widgets\CategAfisha;
use frontend\widgets\CategPage;
use frontend\widgets\CategNews;
use frontend\widgets\CategPres;
use frontend\widgets\TagsWidget;
//use frontend\widgets\NewsSidebarWidget;
use frontend\widgets\ProfileLeftSidebar;
use common\widgets\DbBanner;

$show = false;

$path = Url::current();

$is_company = $this->params['is_company'];
$is_doctor = $this->params['is_doctor'];

if (!stristr($path, 'site')) {

	if (stristr($path, '/profile/') || stristr($path, '/jobs/') || stristr($path, '/account/') || stristr($path, '/adv/advert') || stristr($path, '/firm/update')) {
		if (stristr($path, 'account/')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 0]);
		}
		if (stristr($path, '/adv/advert')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 12]);
		}
		if (stristr($path, 'profile/index') || stristr($path, 'profile/change-avatar')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 1]);
		}
		if (stristr($path, 'firm/update')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 2]);
			echo DbBanner::widget(['key' => 'left_side_poleznieadresa_small']);
		}
		if (stristr($path, 'jobs/job-profile/index') || stristr($path, 'jobs/index') || stristr($path, 'jobs/edu') || stristr($path, 'jobs/exp')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 4]);
		}
		if (stristr($path, 'jobs/resume/create') || stristr($path, 'jobs/resume/update') || stristr($path, 'jobs/resume/my-resume')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 3]);
		}else{
			if (stristr($path, 'jobs/resume/index') || stristr($path, 'jobs/resume')) {
				echo CategJob::widget(['cats' => \common\widgets\Arrays::getJobCat(), 'for' => 'res']);
				echo DbBanner::widget(['key' => 'left_side_vacancia_small']);
			}
		}
		if (stristr($path, 'jobs/vacancy/create') || stristr($path, 'jobs/vacancy/update') || stristr($path, 'jobs/vacancy/my-vacancy')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 5]);
		}else{
			if (stristr($path, 'jobs/vacancy/index') || stristr($path, 'jobs/vacancy')) {
				echo CategJob::widget(['cats' => \common\widgets\Arrays::getJobCat(), 'for' => 'vac']);
				echo DbBanner::widget(['key' => 'left_side_vacancia_small']);
			}
		}
	}
	if (stristr($path, '/med/doctors')) {
		if (stristr($path, '/med/doctors/index') || stristr($path, '/med/doctors/view')) {
			echo \frontend\widgets\CategMed::widget(['cats' => \common\widgets\Arrays::getMedCat()]);
		}
		if (stristr($path, '/med/doctors/update') || stristr($path, '/med/doctors/create') || stristr($path, '/med/doctors/my-serv')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 6]);
		}
	}
	if (stristr($path, '/tags/')) {
		echo \frontend\widgets\TagsWidget::widget();
	}

	if (stristr($path, '/goods')) {
		if (stristr($path, '/goods/update') || stristr($path, '/goods/create') || stristr($path, '/goods/my-ads')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 8]);
		}
		if (stristr($path, '/goods')) {
			echo \frontend\widgets\CategGoodsVMenu::widget();
			echo \frontend\widgets\TagsWidget::widget();
			echo DbBanner::widget(['key' => 'left_side_tovari_small']);
		}
	}
	if (stristr($path, '/service') || stristr($path, '/set-service')) {
		if (stristr($path, 'service/get/update') || stristr($path, 'service/get/create') || stristr($path, 'service/get/my-ads')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 9]);
		}
		if (stristr($path, '/service/get')) {
			echo \frontend\widgets\CategServiceVMenu::widget();
			echo \frontend\widgets\TagsWidget::widget();
			echo DbBanner::widget(['key' => 'left_side_uslygi_small']);
		}
		if (stristr($path, '/service/set')) {
			echo \frontend\widgets\CategSetServiceVMenu::widget();
			echo \frontend\widgets\TagsWidget::widget();
			echo DbBanner::widget(['key' => 'left_side_uslygi_small']);
		}
	}

	if (stristr($path, '/realty')) {
		if (stristr($path, '/realty/sale/update') || stristr($path, '/realty/sale/create') || stristr($path, '/realty/sale/my-ads')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 10]);
		}
		if (stristr($path, '/realty/rent/update') || stristr($path, '/realty/rent/create') || stristr($path, '/realty/rent/my-ads')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 11]);
		}
		if (stristr($path, '/realty/sale')) {
			echo \frontend\widgets\CategRealtySaleVMenu::widget();
			echo \frontend\widgets\TagsWidget::widget();
			echo DbBanner::widget(['key' => 'left_side_nedvigimostproda_small']);
		}
		if (stristr($path, '/realty/rent')) {
			echo \frontend\widgets\CategRealtyRentVMenu::widget();
			echo \frontend\widgets\TagsWidget::widget();
			echo DbBanner::widget(['key' => 'left_side_nedvigimosarend_small']);
		}
	}
	if (stristr($path, '/afisha')) {
		echo \frontend\widgets\CategAfisha::widget();
		echo \frontend\widgets\TagsWidget::widget();
		echo DbBanner::widget(['key' => 'left_side_afisha_small']);
	}
	if (stristr($path, '/firm') && !stristr($path, '/firm/update')) {
		echo \frontend\widgets\CategFirm::widget();
		echo'<br>';
		echo DbBanner::widget(['key' => 'left_side_poleznieadresa_small']);
	}
	if (stristr($path, '/konkurs')) {
		echo \frontend\widgets\CategKonkurs::widget();
		echo DbBanner::widget(['key' => 'left_side_konkurs_small']);
	}
	if (stristr($path, '/news')) {
		echo \frontend\widgets\CategNews::widget();
		echo \frontend\widgets\TagsWidget::widget();
		echo DbBanner::widget(['key' => 'left_side_news_page_big']);
		echo DbBanner::widget(['key' => 'left_side_news_page_small']);
	}
	if (stristr($path, '/page')) {
		echo \frontend\widgets\CategPage::widget();
		echo \frontend\widgets\TagsWidget::widget();
	}
	if (stristr($path, '/forum')) {
		echo \frontend\widgets\CategForum::widget();
		echo \frontend\widgets\TagsWidget::widget();
	}
	if (stristr($path, 'letters')) {
		if (stristr($path, '/letters/my-letters') || stristr($path, '/letters/create') || stristr($path, '/letters/update')) {
			echo ProfileLeftSidebar::widget(['activeElement' => 7]);
		}
		echo \frontend\widgets\CategLetters::widget();
		echo \frontend\widgets\TagsWidget::widget();
	}

	if (stristr($path, 'my-auto') || stristr($path, 'my-auto/create') || stristr($path, 'my-auto/update')) {
		echo ProfileLeftSidebar::widget(['activeElement' => 13]);
	}
	if (stristr($path, '/auto')) {
		echo \frontend\widgets\CategAuto::widget();
	}

	$show = true;

}
