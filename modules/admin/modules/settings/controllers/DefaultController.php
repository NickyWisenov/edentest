<?php

namespace app\modules\admin\modules\settings\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;
use yii\helpers\Html;
use app\modules\admin\modules\settings\models\Settings;

/**
 * Default controller for the `settings` module
 */
class DefaultController extends Controller {

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex() {
        if (isset($_POST['settings']) && is_array($_POST['settings'])) {
            foreach ($_POST['settings'] as $slug => $sett) {
                $row1 = Settings::find()->where(['slug' => $slug])->one();
                if ($row1) {
                    $row1->value = $sett;
                    $row1->save(FALSE);
                }
            }
            Yii::$app->session->setFlash('success', "Global Settings updated successfully.");
            Yii::$app->session->setFlash('selected_tab', isset($_POST['tab']) ? $_POST['tab'] : 1);
            return $this->redirect(Yii::$app->urlManager->createAbsoluteUrl(['admin/settings/']));
        }
        $data = array();
        $data['tab'] = 1;
        $modules = [];
        $system_tab = array();

        $systems[] = array('title' => 'PHP Version', 'value' => phpversion() . '&nbsp&nbsp<a href="' . Yii::$app->urlManager->createAbsoluteUrl(['']) . '" target="_blank">Complete PHP Info</a>');
        $systems[] = array('title' => 'MySQL Version', 'value' => Settings::mysql_version());
        foreach (Settings::find()->all() as $mod) {
            $modules[$mod->module][] = (object) array(
                        'slug' => $mod->slug,
                        'title' => $mod->title,
                        'description' => $mod->description,
                        'type' => $mod->type,
                        'default' => $mod->default,
                        'value' => $mod->value,
                        'module' => $mod->module,
            );
        }
        foreach ($systems as $system) {
            $system_tab[] = (object) array(
                        'slug' => isset($system['slug']) ? $system['slug'] : '',
                        'title' => isset($system['title']) ? $system['title'] : '',
                        'description' => isset($system['description']) ? $system['description'] : '',
                        'type' => isset($system['type']) ? $system['type'] : '',
                        'default' => isset($system['default']) ? $system['default'] : '',
                        'value' => isset($system['value']) ? $system['value'] : '',
                        'module' => 'System',
            );
        }

        $modules['System'] = $system_tab;
        $data['modules'] = $modules;
        return $this->render('index', ['data' => $data]);
    }

    public function rand_string($digits) {
        $alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz" . time();
        $rand = substr(str_shuffle($alphanum), 0, $digits);
        return $rand;
    }

}
