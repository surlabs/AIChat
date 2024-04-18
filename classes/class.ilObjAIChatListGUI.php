<?php
declare(strict_types=1);

/**
 *  This file is part of the AI Chat Repository Object plugin for ILIAS, which allows your platform's users
 *  To connect with an external LLM service
 *  This plugin is created and maintained by SURLABS.
 *
 *  The AI Chat Repository Object plugin for ILIAS is open-source and licensed under GPL-3.0.
 *  For license details, visit https://www.gnu.org/licenses/gpl-3.0.en.html.
 *
 *  To report bugs or participate in discussions, visit the Mantis system and filter by
 *  the category "AI Chat" at https://mantis.ilias.de.
 *
 *  More information and source code are available at:
 *  https://github.com/surlabs/AIChat
 *
 *  If you need support, please contact the maintainer of this software at:
 *  info@surlabs.es
 *
 */
class ilObjAIChatListGUI extends ilObjectPluginListGUI
{

    public function initType() : void
    {
        $this->setType(ilAIChatPlugin::ID);
    }

    public function getGuiClass() : string
    {
        return "ilObjAIChatGUI";
    }

    public function initCommands() : array
    {
        return array
        (
            array(
                "permission" => "read",
                "cmd" => "showContent",
                "default" => true
            ),
            array(
                "permission" => "write",
                "cmd" => "editProperties",
                "txt" => $this->txt("edit"),
                "default" => false
            )
        );
    }

    public function getProperties() : array
    {
        $props = array();

        if (!ilObjAIChatAccess::checkOnline($this->obj_id)) {
            $props[] = array("alert" => true,
                "property" => $this->txt("status"),
                "value" => $this->txt("offline")
            );

        }

        return $props;
    }
}