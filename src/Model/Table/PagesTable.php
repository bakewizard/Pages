<?php

declare(strict_types=1);

namespace Pages\Model\Table;

use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pages Model
 *
 * @property |\Cake\ORM\Association\BelongsToMany $I18n
 *
 * @method \Pages\Model\Entity\Page get($primaryKey, $options = [])
 * @method \Pages\Model\Entity\Page newEntity($data = null, array $options = [])
 * @method \Pages\Model\Entity\Page[] newEntities(array $data, array $options = [])
 * @method \Pages\Model\Entity\Page|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Pages\Model\Entity\Page saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \Pages\Model\Entity\Page patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \Pages\Model\Entity\Page[] patchEntities($entities, array $data, array $options = [])
 * @method \Pages\Model\Entity\Page findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PagesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('pages');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Translate', [
            'fields' => ['name', 'content', 'seo_title', 'seo_description', 'seo_keywords'],
            'translationTable' => 'PagesI18n'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
                ->nonNegativeInteger('id')
                ->allowEmptyString('id', null, 'create');

        $validator
                ->scalar('name')
                ->maxLength('name', 100)
                ->requirePresence('name', 'create')
                ->notEmptyString('name');

        $validator
                ->scalar('alias')
                ->maxLength('alias', 100)
                ->requirePresence('alias', 'create')
                ->notEmptyString('alias')
                ->add('alias', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
                ->scalar('content')
                ->maxLength('content', 16777215)
                ->requirePresence('content', 'create')
                ->notEmptyString('content');

        $validator
                ->scalar('seo_title')
                ->maxLength('seo_title', 160)
                ->allowEmptyString('seo_title');

        $validator
                ->scalar('seo_description')
                ->maxLength('seo_description', 280)
                ->allowEmptyString('seo_description');

        $validator
                ->scalar('seo_keywords')
                ->maxLength('seo_keywords', 100)
                ->allowEmptyString('seo_keywords');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->isUnique(['alias']));

        return $rules;
    }

}
