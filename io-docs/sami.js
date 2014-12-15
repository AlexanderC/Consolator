(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '    <ul>                <li data-name="namespace:" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href=".html">AlexanderC</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="namespace:AlexanderC_Consolator" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator.html">Consolator</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="namespace:AlexanderC_Consolator_Command" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Command.html">Command</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="namespace:AlexanderC_Consolator_Command_Helper" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Command/Helper.html">Helper</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:AlexanderC_Consolator_Command_Helper_MultiName" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Helper/MultiName.html">MultiName</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:AlexanderC_Consolator_Command_Implementation" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Command/Implementation.html">Implementation</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="namespace:AlexanderC_Consolator_Command_Implementation_Helper" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Command/Implementation/Helper.html">Helper</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:AlexanderC_Consolator_Command_Implementation_Helper_CommandPrototype" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Implementation/Helper/CommandPrototype.html">CommandPrototype</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_Implementation_HelpCommand" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Implementation/HelpCommand.html">HelpCommand</a>                    </div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_Implementation_ListCommand" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Implementation/ListCommand.html">ListCommand</a>                    </div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_Implementation_RunCommand" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Implementation/RunCommand.html">RunCommand</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:AlexanderC_Consolator_Command_Input" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Command/Input.html">Input</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="namespace:AlexanderC_Consolator_Command_Input_Exceptions" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Command/Input/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:AlexanderC_Consolator_Command_Input_Exceptions_MissingInputException" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Input/Exceptions/MissingInputException.html">MissingInputException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_Input_AbstractInput" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Input/AbstractInput.html">AbstractInput</a>                    </div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_Input_StdInput" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Input/StdInput.html">StdInput</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:AlexanderC_Consolator_Command_Output" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Command/Output.html">Output</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="namespace:AlexanderC_Consolator_Command_Output_Formatter" >                    <div style="padding-left:72px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Command/Output/Formatter.html">Formatter</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:AlexanderC_Consolator_Command_Output_Formatter_AbstractFormatter" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Output/Formatter/AbstractFormatter.html">AbstractFormatter</a>                    </div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_Output_Formatter_ColorFormatter" >                    <div style="padding-left:98px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Output/Formatter/ColorFormatter.html">ColorFormatter</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_Output_AbstractOutput" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Output/AbstractOutput.html">AbstractOutput</a>                    </div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_Output_StdOutput" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/Output/StdOutput.html">StdOutput</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_AbstractCommand" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/AbstractCommand.html">AbstractCommand</a>                    </div>                </li>                            <li data-name="class:AlexanderC_Consolator_Command_CommandsCollection" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="AlexanderC/Consolator/Command/CommandsCollection.html">CommandsCollection</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:AlexanderC_Consolator_Exception" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Exception.html">Exception</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:AlexanderC_Consolator_Exception_ConfigurationException" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="AlexanderC/Consolator/Exception/ConfigurationException.html">ConfigurationException</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:AlexanderC_Consolator_Helper" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="AlexanderC/Consolator/Helper.html">Helper</a>                    </div>                    <div class="bd">                            <ul>                <li data-name="class:AlexanderC_Consolator_Helper_ApplicationAwareTrait" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="AlexanderC/Consolator/Helper/ApplicationAwareTrait.html">ApplicationAwareTrait</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:AlexanderC_Consolator_Application" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="AlexanderC/Consolator/Application.html">Application</a>                    </div>                </li>                            <li data-name="class:AlexanderC_Consolator_Config" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="AlexanderC/Consolator/Config.html">Config</a>                    </div>                </li>                </ul></div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    {"type": "Namespace", "link": "AlexanderC.html", "name": "AlexanderC", "doc": "Namespace AlexanderC"},{"type": "Namespace", "link": "AlexanderC/Consolator.html", "name": "AlexanderC\\Consolator", "doc": "Namespace AlexanderC\\Consolator"},{"type": "Namespace", "link": "AlexanderC/Consolator/Command.html", "name": "AlexanderC\\Consolator\\Command", "doc": "Namespace AlexanderC\\Consolator\\Command"},{"type": "Namespace", "link": "AlexanderC/Consolator/Command/Helper.html", "name": "AlexanderC\\Consolator\\Command\\Helper", "doc": "Namespace AlexanderC\\Consolator\\Command\\Helper"},{"type": "Namespace", "link": "AlexanderC/Consolator/Command/Implementation.html", "name": "AlexanderC\\Consolator\\Command\\Implementation", "doc": "Namespace AlexanderC\\Consolator\\Command\\Implementation"},{"type": "Namespace", "link": "AlexanderC/Consolator/Command/Implementation/Helper.html", "name": "AlexanderC\\Consolator\\Command\\Implementation\\Helper", "doc": "Namespace AlexanderC\\Consolator\\Command\\Implementation\\Helper"},{"type": "Namespace", "link": "AlexanderC/Consolator/Command/Input.html", "name": "AlexanderC\\Consolator\\Command\\Input", "doc": "Namespace AlexanderC\\Consolator\\Command\\Input"},{"type": "Namespace", "link": "AlexanderC/Consolator/Command/Input/Exceptions.html", "name": "AlexanderC\\Consolator\\Command\\Input\\Exceptions", "doc": "Namespace AlexanderC\\Consolator\\Command\\Input\\Exceptions"},{"type": "Namespace", "link": "AlexanderC/Consolator/Command/Output.html", "name": "AlexanderC\\Consolator\\Command\\Output", "doc": "Namespace AlexanderC\\Consolator\\Command\\Output"},{"type": "Namespace", "link": "AlexanderC/Consolator/Command/Output/Formatter.html", "name": "AlexanderC\\Consolator\\Command\\Output\\Formatter", "doc": "Namespace AlexanderC\\Consolator\\Command\\Output\\Formatter"},{"type": "Namespace", "link": "AlexanderC/Consolator/Exception.html", "name": "AlexanderC\\Consolator\\Exception", "doc": "Namespace AlexanderC\\Consolator\\Exception"},{"type": "Namespace", "link": "AlexanderC/Consolator/Helper.html", "name": "AlexanderC\\Consolator\\Helper", "doc": "Namespace AlexanderC\\Consolator\\Helper"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator", "fromLink": "AlexanderC/Consolator.html", "link": "AlexanderC/Consolator/Application.html", "name": "AlexanderC\\Consolator\\Application", "doc": "&quot;Class Application&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method___construct", "name": "AlexanderC\\Consolator\\Application::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_getCommands", "name": "AlexanderC\\Consolator\\Application::getCommands", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_getConfig", "name": "AlexanderC\\Consolator\\Application::getConfig", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_getMainScript", "name": "AlexanderC\\Consolator\\Application::getMainScript", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_resolveCommand", "name": "AlexanderC\\Consolator\\Application::resolveCommand", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_runCommand", "name": "AlexanderC\\Consolator\\Application::runCommand", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_guessCommand", "name": "AlexanderC\\Consolator\\Application::guessCommand", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_run", "name": "AlexanderC\\Consolator\\Application::run", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_terminate", "name": "AlexanderC\\Consolator\\Application::terminate", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_registerAutoload", "name": "AlexanderC\\Consolator\\Application::registerAutoload", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Application", "fromLink": "AlexanderC/Consolator/Application.html", "link": "AlexanderC/Consolator/Application.html#method_registerCommandFile", "name": "AlexanderC\\Consolator\\Application::registerCommandFile", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command", "fromLink": "AlexanderC/Consolator/Command.html", "link": "AlexanderC/Consolator/Command/AbstractCommand.html", "name": "AlexanderC\\Consolator\\Command\\AbstractCommand", "doc": "&quot;Class AbstractCommand&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\AbstractCommand", "fromLink": "AlexanderC/Consolator/Command/AbstractCommand.html", "link": "AlexanderC/Consolator/Command/AbstractCommand.html#method_getName", "name": "AlexanderC\\Consolator\\Command\\AbstractCommand::getName", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\AbstractCommand", "fromLink": "AlexanderC/Consolator/Command/AbstractCommand.html", "link": "AlexanderC/Consolator/Command/AbstractCommand.html#method_getDescription", "name": "AlexanderC\\Consolator\\Command\\AbstractCommand::getDescription", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\AbstractCommand", "fromLink": "AlexanderC/Consolator/Command/AbstractCommand.html", "link": "AlexanderC/Consolator/Command/AbstractCommand.html#method_getHelp", "name": "AlexanderC\\Consolator\\Command\\AbstractCommand::getHelp", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\AbstractCommand", "fromLink": "AlexanderC/Consolator/Command/AbstractCommand.html", "link": "AlexanderC/Consolator/Command/AbstractCommand.html#method_run", "name": "AlexanderC\\Consolator\\Command\\AbstractCommand::run", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command", "fromLink": "AlexanderC/Consolator/Command.html", "link": "AlexanderC/Consolator/Command/CommandsCollection.html", "name": "AlexanderC\\Consolator\\Command\\CommandsCollection", "doc": "&quot;Class CommandsCollection&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\CommandsCollection", "fromLink": "AlexanderC/Consolator/Command/CommandsCollection.html", "link": "AlexanderC/Consolator/Command/CommandsCollection.html#method_getIterator", "name": "AlexanderC\\Consolator\\Command\\CommandsCollection::getIterator", "doc": "&quot;(PHP 5 &amp;gt;= 5.0.0)&lt;br\/&gt;\nRetrieve an external iterator&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\CommandsCollection", "fromLink": "AlexanderC/Consolator/Command/CommandsCollection.html", "link": "AlexanderC/Consolator/Command/CommandsCollection.html#method_add", "name": "AlexanderC\\Consolator\\Command\\CommandsCollection::add", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\CommandsCollection", "fromLink": "AlexanderC/Consolator/Command/CommandsCollection.html", "link": "AlexanderC/Consolator/Command/CommandsCollection.html#method_resolve", "name": "AlexanderC\\Consolator\\Command\\CommandsCollection::resolve", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\CommandsCollection", "fromLink": "AlexanderC/Consolator/Command/CommandsCollection.html", "link": "AlexanderC/Consolator/Command/CommandsCollection.html#method_guess", "name": "AlexanderC\\Consolator\\Command\\CommandsCollection::guess", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Helper", "fromLink": "AlexanderC/Consolator/Command/Helper.html", "link": "AlexanderC/Consolator/Command/Helper/MultiName.html", "name": "AlexanderC\\Consolator\\Command\\Helper\\MultiName", "doc": "&quot;Class MultiName&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Helper\\MultiName", "fromLink": "AlexanderC/Consolator/Command/Helper/MultiName.html", "link": "AlexanderC/Consolator/Command/Helper/MultiName.html#method___construct", "name": "AlexanderC\\Consolator\\Command\\Helper\\MultiName::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Helper\\MultiName", "fromLink": "AlexanderC/Consolator/Command/Helper/MultiName.html", "link": "AlexanderC/Consolator/Command/Helper/MultiName.html#method_getNames", "name": "AlexanderC\\Consolator\\Command\\Helper\\MultiName::getNames", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Helper\\MultiName", "fromLink": "AlexanderC/Consolator/Command/Helper/MultiName.html", "link": "AlexanderC/Consolator/Command/Helper/MultiName.html#method___toString", "name": "AlexanderC\\Consolator\\Command\\Helper\\MultiName::__toString", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Implementation", "fromLink": "AlexanderC/Consolator/Command/Implementation.html", "link": "AlexanderC/Consolator/Command/Implementation/HelpCommand.html", "name": "AlexanderC\\Consolator\\Command\\Implementation\\HelpCommand", "doc": "&quot;Class HelpCommand&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\HelpCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/HelpCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/HelpCommand.html#method_getName", "name": "AlexanderC\\Consolator\\Command\\Implementation\\HelpCommand::getName", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\HelpCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/HelpCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/HelpCommand.html#method_getDescription", "name": "AlexanderC\\Consolator\\Command\\Implementation\\HelpCommand::getDescription", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\HelpCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/HelpCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/HelpCommand.html#method_getHelp", "name": "AlexanderC\\Consolator\\Command\\Implementation\\HelpCommand::getHelp", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\HelpCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/HelpCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/HelpCommand.html#method_run", "name": "AlexanderC\\Consolator\\Command\\Implementation\\HelpCommand::run", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\Helper", "fromLink": "AlexanderC/Consolator/Command/Implementation/Helper.html", "link": "AlexanderC/Consolator/Command/Implementation/Helper/CommandPrototype.html", "name": "AlexanderC\\Consolator\\Command\\Implementation\\Helper\\CommandPrototype", "doc": "&quot;Class CommandPrototype&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\Helper\\CommandPrototype", "fromLink": "AlexanderC/Consolator/Command/Implementation/Helper/CommandPrototype.html", "link": "AlexanderC/Consolator/Command/Implementation/Helper/CommandPrototype.html#method_run", "name": "AlexanderC\\Consolator\\Command\\Implementation\\Helper\\CommandPrototype::run", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\Helper\\CommandPrototype", "fromLink": "AlexanderC/Consolator/Command/Implementation/Helper/CommandPrototype.html", "link": "AlexanderC/Consolator/Command/Implementation/Helper/CommandPrototype.html#method_loadFile", "name": "AlexanderC\\Consolator\\Command\\Implementation\\Helper\\CommandPrototype::loadFile", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Implementation", "fromLink": "AlexanderC/Consolator/Command/Implementation.html", "link": "AlexanderC/Consolator/Command/Implementation/ListCommand.html", "name": "AlexanderC\\Consolator\\Command\\Implementation\\ListCommand", "doc": "&quot;Class ListCommand&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\ListCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/ListCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/ListCommand.html#method_getName", "name": "AlexanderC\\Consolator\\Command\\Implementation\\ListCommand::getName", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\ListCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/ListCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/ListCommand.html#method_getDescription", "name": "AlexanderC\\Consolator\\Command\\Implementation\\ListCommand::getDescription", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\ListCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/ListCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/ListCommand.html#method_getHelp", "name": "AlexanderC\\Consolator\\Command\\Implementation\\ListCommand::getHelp", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\ListCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/ListCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/ListCommand.html#method_run", "name": "AlexanderC\\Consolator\\Command\\Implementation\\ListCommand::run", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Implementation", "fromLink": "AlexanderC/Consolator/Command/Implementation.html", "link": "AlexanderC/Consolator/Command/Implementation/RunCommand.html", "name": "AlexanderC\\Consolator\\Command\\Implementation\\RunCommand", "doc": "&quot;Class ListCommand&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\RunCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/RunCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/RunCommand.html#method_getName", "name": "AlexanderC\\Consolator\\Command\\Implementation\\RunCommand::getName", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\RunCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/RunCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/RunCommand.html#method_getDescription", "name": "AlexanderC\\Consolator\\Command\\Implementation\\RunCommand::getDescription", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\RunCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/RunCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/RunCommand.html#method_getHelp", "name": "AlexanderC\\Consolator\\Command\\Implementation\\RunCommand::getHelp", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Implementation\\RunCommand", "fromLink": "AlexanderC/Consolator/Command/Implementation/RunCommand.html", "link": "AlexanderC/Consolator/Command/Implementation/RunCommand.html#method_run", "name": "AlexanderC\\Consolator\\Command\\Implementation\\RunCommand::run", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Input", "fromLink": "AlexanderC/Consolator/Command/Input.html", "link": "AlexanderC/Consolator/Command/Input/AbstractInput.html", "name": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput", "doc": "&quot;Class AbstractInput&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput", "fromLink": "AlexanderC/Consolator/Command/Input/AbstractInput.html", "link": "AlexanderC/Consolator/Command/Input/AbstractInput.html#method_defineArguments", "name": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput::defineArguments", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput", "fromLink": "AlexanderC/Consolator/Command/Input/AbstractInput.html", "link": "AlexanderC/Consolator/Command/Input/AbstractInput.html#method_cloneFiltered", "name": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput::cloneFiltered", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput", "fromLink": "AlexanderC/Consolator/Command/Input/AbstractInput.html", "link": "AlexanderC/Consolator/Command/Input/AbstractInput.html#method_add", "name": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput::add", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput", "fromLink": "AlexanderC/Consolator/Command/Input/AbstractInput.html", "link": "AlexanderC/Consolator/Command/Input/AbstractInput.html#method_all", "name": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput::all", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput", "fromLink": "AlexanderC/Consolator/Command/Input/AbstractInput.html", "link": "AlexanderC/Consolator/Command/Input/AbstractInput.html#method_has", "name": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput::has", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput", "fromLink": "AlexanderC/Consolator/Command/Input/AbstractInput.html", "link": "AlexanderC/Consolator/Command/Input/AbstractInput.html#method_get", "name": "AlexanderC\\Consolator\\Command\\Input\\AbstractInput::get", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Input\\Exceptions", "fromLink": "AlexanderC/Consolator/Command/Input/Exceptions.html", "link": "AlexanderC/Consolator/Command/Input/Exceptions/MissingInputException.html", "name": "AlexanderC\\Consolator\\Command\\Input\\Exceptions\\MissingInputException", "doc": "&quot;Class MissingInputException&quot;"},
                    
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Input", "fromLink": "AlexanderC/Consolator/Command/Input.html", "link": "AlexanderC/Consolator/Command/Input/StdInput.html", "name": "AlexanderC\\Consolator\\Command\\Input\\StdInput", "doc": "&quot;Class StdInput&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\StdInput", "fromLink": "AlexanderC/Consolator/Command/Input/StdInput.html", "link": "AlexanderC/Consolator/Command/Input/StdInput.html#method___construct", "name": "AlexanderC\\Consolator\\Command\\Input\\StdInput::__construct", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\StdInput", "fromLink": "AlexanderC/Consolator/Command/Input/StdInput.html", "link": "AlexanderC/Consolator/Command/Input/StdInput.html#method_all", "name": "AlexanderC\\Consolator\\Command\\Input\\StdInput::all", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\StdInput", "fromLink": "AlexanderC/Consolator/Command/Input/StdInput.html", "link": "AlexanderC/Consolator/Command/Input/StdInput.html#method_has", "name": "AlexanderC\\Consolator\\Command\\Input\\StdInput::has", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Input\\StdInput", "fromLink": "AlexanderC/Consolator/Command/Input/StdInput.html", "link": "AlexanderC/Consolator/Command/Input/StdInput.html#method_get", "name": "AlexanderC\\Consolator\\Command\\Input\\StdInput::get", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Output", "fromLink": "AlexanderC/Consolator/Command/Output.html", "link": "AlexanderC/Consolator/Command/Output/AbstractOutput.html", "name": "AlexanderC\\Consolator\\Command\\Output\\AbstractOutput", "doc": "&quot;Class AbstractOutput&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\AbstractOutput", "fromLink": "AlexanderC/Consolator/Command/Output/AbstractOutput.html", "link": "AlexanderC/Consolator/Command/Output/AbstractOutput.html#method_write", "name": "AlexanderC\\Consolator\\Command\\Output\\AbstractOutput::write", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\AbstractOutput", "fromLink": "AlexanderC/Consolator/Command/Output/AbstractOutput.html", "link": "AlexanderC/Consolator/Command/Output/AbstractOutput.html#method_writeln", "name": "AlexanderC\\Consolator\\Command\\Output\\AbstractOutput::writeln", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\AbstractOutput", "fromLink": "AlexanderC/Consolator/Command/Output/AbstractOutput.html", "link": "AlexanderC/Consolator/Command/Output/AbstractOutput.html#method_flush", "name": "AlexanderC\\Consolator\\Command\\Output\\AbstractOutput::flush", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\AbstractOutput", "fromLink": "AlexanderC/Consolator/Command/Output/AbstractOutput.html", "link": "AlexanderC/Consolator/Command/Output/AbstractOutput.html#method___destruct", "name": "AlexanderC\\Consolator\\Command\\Output\\AbstractOutput::__destruct", "doc": "&quot;{@inheritdoc}&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Output\\Formatter", "fromLink": "AlexanderC/Consolator/Command/Output/Formatter.html", "link": "AlexanderC/Consolator/Command/Output/Formatter/AbstractFormatter.html", "name": "AlexanderC\\Consolator\\Command\\Output\\Formatter\\AbstractFormatter", "doc": "&quot;Class AbstractFormatter&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\Formatter\\AbstractFormatter", "fromLink": "AlexanderC/Consolator/Command/Output/Formatter/AbstractFormatter.html", "link": "AlexanderC/Consolator/Command/Output/Formatter/AbstractFormatter.html#method_format", "name": "AlexanderC\\Consolator\\Command\\Output\\Formatter\\AbstractFormatter::format", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Output\\Formatter", "fromLink": "AlexanderC/Consolator/Command/Output/Formatter.html", "link": "AlexanderC/Consolator/Command/Output/Formatter/ColorFormatter.html", "name": "AlexanderC\\Consolator\\Command\\Output\\Formatter\\ColorFormatter", "doc": "&quot;Class ColorFormatter&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\Formatter\\ColorFormatter", "fromLink": "AlexanderC/Consolator/Command/Output/Formatter/ColorFormatter.html", "link": "AlexanderC/Consolator/Command/Output/Formatter/ColorFormatter.html#method_format", "name": "AlexanderC\\Consolator\\Command\\Output\\Formatter\\ColorFormatter::format", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Command\\Output", "fromLink": "AlexanderC/Consolator/Command/Output.html", "link": "AlexanderC/Consolator/Command/Output/StdOutput.html", "name": "AlexanderC\\Consolator\\Command\\Output\\StdOutput", "doc": "&quot;Class StdOutput&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\StdOutput", "fromLink": "AlexanderC/Consolator/Command/Output/StdOutput.html", "link": "AlexanderC/Consolator/Command/Output/StdOutput.html#method___construct", "name": "AlexanderC\\Consolator\\Command\\Output\\StdOutput::__construct", "doc": "&quot;{@inheritdoc}&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\StdOutput", "fromLink": "AlexanderC/Consolator/Command/Output/StdOutput.html", "link": "AlexanderC/Consolator/Command/Output/StdOutput.html#method_write", "name": "AlexanderC\\Consolator\\Command\\Output\\StdOutput::write", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\StdOutput", "fromLink": "AlexanderC/Consolator/Command/Output/StdOutput.html", "link": "AlexanderC/Consolator/Command/Output/StdOutput.html#method_writeln", "name": "AlexanderC\\Consolator\\Command\\Output\\StdOutput::writeln", "doc": "&quot;\n&quot;"},
                    {"type": "Method", "fromName": "AlexanderC\\Consolator\\Command\\Output\\StdOutput", "fromLink": "AlexanderC/Consolator/Command/Output/StdOutput.html", "link": "AlexanderC/Consolator/Command/Output/StdOutput.html#method_flush", "name": "AlexanderC\\Consolator\\Command\\Output\\StdOutput::flush", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator", "fromLink": "AlexanderC/Consolator.html", "link": "AlexanderC/Consolator/Config.html", "name": "AlexanderC\\Consolator\\Config", "doc": "&quot;Class Config&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Config", "fromLink": "AlexanderC/Consolator/Config.html", "link": "AlexanderC/Consolator/Config.html#method_fromArray", "name": "AlexanderC\\Consolator\\Config::fromArray", "doc": "&quot;\n&quot;"},
            
            {"type": "Class", "fromName": "AlexanderC\\Consolator\\Exception", "fromLink": "AlexanderC/Consolator/Exception.html", "link": "AlexanderC/Consolator/Exception/ConfigurationException.html", "name": "AlexanderC\\Consolator\\Exception\\ConfigurationException", "doc": "&quot;Class ConfigurationException&quot;"},
                    
            {"type": "Trait", "fromName": "AlexanderC\\Consolator\\Helper", "fromLink": "AlexanderC/Consolator/Helper.html", "link": "AlexanderC/Consolator/Helper/ApplicationAwareTrait.html", "name": "AlexanderC\\Consolator\\Helper\\ApplicationAwareTrait", "doc": "&quot;Class ApplicationAwareTrait&quot;"},
                                                        {"type": "Method", "fromName": "AlexanderC\\Consolator\\Helper\\ApplicationAwareTrait", "fromLink": "AlexanderC/Consolator/Helper/ApplicationAwareTrait.html", "link": "AlexanderC/Consolator/Helper/ApplicationAwareTrait.html#method_setApplication", "name": "AlexanderC\\Consolator\\Helper\\ApplicationAwareTrait::setApplication", "doc": "&quot;\n&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


