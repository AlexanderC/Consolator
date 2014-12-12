#!/bin/bash

PHP=$(which php)
BINARY_PATH=$(dirname ${PHP})
CSL_BINARY="https://raw.githubusercontent.com/AlexanderC/Consolator/master/build/consolator.phar"
CSL_INCLUDE="https://raw.githubusercontent.com/AlexanderC/Consolator/master/build/consolator.noshebang.phar"
INCLUDE_PATH=$(${PHP} -r "echo rtrim(explode(':', ltrim(get_include_path(), '.:'))[0], '/');")

echo ""
echo "Adding consolator.phar to include path "${INCLUDE_PATH}
curl -XGET ${CSL_INCLUDE} --output ${INCLUDE_PATH}"/consolator.phar"
echo ""
echo "Adding consolator to the binaries path "${BINARY_PATH}
curl -XGET ${CSL_BINARY} --output ${BINARY_PATH}"/consolator"
chmod +x ${BINARY_PATH}"/consolator"
echo ""
echo "Done!"
echo ""