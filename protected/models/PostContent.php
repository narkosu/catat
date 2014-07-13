<?php

/**
 * This is the model class for table "{{post_content}}".
 *
 * The followings are the available columns in table '{{post_content}}':
 * @property string $id
 * @property integer $post_id
 * @property string $contents
 * @property string $create_time
 * @property string $update_time
 * @property integer $author_id
 */
class PostContent extends CActiveRecord
{
	
  const STATUS_PENDING=1;
	const STATUS_APPROVED=2;
  
  /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PostContent the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post_content}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('post_id, author_id', 'numerical', 'integerOnly'=>true),
			array('contents, create_time, update_time', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, post_id, contents, create_time, update_time, author_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'post_id' => 'Post',
			'contents' => 'Contents',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'author_id' => 'Author',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('post_id',$this->post_id);
		$criteria->compare('contents',$this->contents,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);
		$criteria->compare('author_id',$this->author_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
  
  public function saveCustome($post){
      if ( isset($post['id']) ){
          $thisModel = $this->find('id = '.$post['id'] .' AND post_id = ' . $post['post_id'] ); // update
          
      }else{
          $thisModel = new PostContent;
      }
      
      $thisModel->attributes = $post;
      $thisModel->save();
      return $thisModel;
      
  }
}