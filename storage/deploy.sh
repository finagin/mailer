#!/usr/bin/env bash

composer global require "laravel/envoy=~1.0";

if [ $(! echo "$PATH" | grep -q "~/.composer/vendor/bin") ]; then
	export PATH=$PATH:~/.composer/vendor/bin;
fi;

cd $TRAVIS_BUILD_DIR;
envoy run deply;