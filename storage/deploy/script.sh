#!/usr/bin/env bash

export ENCRYPT_VI
export ENCRYPT_KEY
export DEPLOY_SERVER;
export DEPLOY_HOSTNAME;
export DEPLOY_USERNAME;
export TRAVIS_BUILD_DIR;

sed -i -e "s/{{ *DEPLOY_SERVER *}}/${DEPLOY_SERVER}/g" ${TRAVIS_BUILD_DIR}/storage/deploy/config;
sed -i -e "s/{{ *DEPLOY_HOSTNAME *}}/${DEPLOY_HOSTNAME}/g" ${TRAVIS_BUILD_DIR}/storage/deploy/config;
sed -i -e "s/{{ *DEPLOY_USERNAME *}}/${DEPLOY_USERNAME}/g" ${TRAVIS_BUILD_DIR}/storage/deploy/config;

cp ${TRAVIS_BUILD_DIR}/storage/deploy/config ~/.ssh/;

openssl aes-256-cbc -K ${!ENCRYPT_KEY} -iv ${!ENCRYPT_VI} -in ${TRAVIS_BUILD_DIR}/storage/deploy/deploy_rsa.enc -out ~/.ssh/deploy_rsa -d;

mysql -e 'CREATE DATABASE IF NOT EXISTS `travis-ci`;'
