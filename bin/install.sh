#!/bin/bash

PHP=$(which php)

if [ ! -x ${PHP} ]; then
    echo "No PHP executable found"
    exit 1
fi

IS_PHP_OK=$(${PHP} -r "echo (int) version_compare(PHP_VERSION, '5.5.0', '>=');")

if [ 0 == ${IS_PHP_OK} ]; then
    echo "Consider updating PHP at least to PHP v5.5"
    exit 1
fi

UUID=$(cat /dev/urandom | env LC_CTYPE=C tr -dc 'a-zA-Z0-9' | fold -w 32 | head -n 1)
BINARY_PATH=$(dirname ${PHP})
CSL_BINARY="https://raw.githubusercontent.com/AlexanderC/Consolator/master/build/consolator.phar?___="${UUID}
CSL_INCLUDE="https://raw.githubusercontent.com/AlexanderC/Consolator/master/build/consolator.noshebang.phar?___="${UUID}
INCLUDE_PATH=$(${PHP} -r "echo rtrim(explode(':', ltrim(get_include_path(), '.:'))[0], '/');")

echo "+ Adding consolator.phar to include path "${INCLUDE_PATH}
rm -f ${INCLUDE_PATH}"/consolator.phar"
curl -XGET ${CSL_INCLUDE} --output ${INCLUDE_PATH}"/consolator.phar" --progress-bar --insecure
echo "+ Adding consolator to the binaries path "${BINARY_PATH}
rm -f ${BINARY_PATH}"/consolator"
curl -XGET ${CSL_BINARY} --output ${BINARY_PATH}"/consolator" --progress-bar --insecure
chmod a+x ${BINARY_PATH}"/consolator"
echo "  Done!"
exit 0