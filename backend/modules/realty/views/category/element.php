<?php
	echo '<div class="row">';
		echo '<div class="container-fluid">';
			echo '<div class="row">';
			echo '<div class="col-md-3">';
			echo $form->field($node, 'area_home')->radioList(['0'=>'Нет','1'=>'Есть'])->label('Площадь квартиры (дома)');
			echo'</div>';
			echo '<div class="col-md-3">';
			echo $form->field($node, 'area_land')->radioList(['0'=>'Нет','1'=>'Есть'])->label('Площадь участка');
			echo'</div>';
			echo '<div class="col-md-3">';
			echo $form->field($node, 'floor')->radioList(['0'=>'Нет','1'=>'Есть'])->label('Этаж квартиры');
			echo'</div>';
			echo '<div class="col-md-3">';
			echo $form->field($node, 'floor_home')->radioList(['0'=>'Нет','1'=>'Есть'])->label('Этажность дома');
			echo'</div>';
			echo '<div class="col-md-3">';
			echo $form->field($node, 'comfort')->radioList(['0'=>'Нет','1'=>'Да'])->label('Показывать удобства');
			echo'</div>';
			echo '<div class="col-md-3">';
			echo $form->field($node, 'repair')->radioList(['0'=>'Нет','1'=>'Да'])->label('Показывать состояние ремонта');
			echo'</div>';
			echo '<div class="col-md-3">';
			echo $form->field($node, 'resell')->radioList(['0'=>'Нет','1'=>'Да'])->label('Показывать тип жилья');
			echo'</div>';
			echo '<div class="col-md-3">';
			echo $form->field($node, 'type')->radioList(['0'=>'Нет','1'=>'Да'])->label('Показывать тип строения');
			echo'</div>';
			echo'</div>';
			echo $form->field($node, 'alias')->textarea()->textInput(['maxlength' => true])->label('Алиас');
			echo $form->field($node, 'm_keyword')->textarea()->textarea(['maxlength' => true])->label('Ключевые слова');
			echo $form->field($node, 'm_description')->textarea()->textarea(['maxlength' => true])->label('Мета описание');
		echo'</div>';
	echo'</div>';
