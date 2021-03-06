<?php

/*
 * Copyright (C) 2015 - Ednei Leite da Silva
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace application\models;

use system\Model;

/**
 * Manipulação de dados referente aos feedbacks
 *
 * @author Ednei Leite da Silva
 */
class Feedback extends Model {

    /**
     * Cadastra tipo de feedback
     *
     * @param string $nome Nome do feedback
     * @param string $abrev Abreviatura
     * @param boolean $descontar  Descontar tempo
     * @param string $descricao Descrição do tipo de feedback
     * @return boolean
     */
    public function cadastrar($nome, $abrev, $descontar, $descricao) {
        $dados = array(
            'nome' => $nome,
            'abreviatura' => $abrev,
            'descontar' => $descontar,
            'descricao' => $descricao
        );

        return $this->insert('phpmycall.tipo_feedback', $dados);
    }

    /**
     * Busca de dados do tipo de feedback
     *
     * @return array Retorna Array com dados do tipo de Feedback
     */
    public function getDadosTipoFeedback() {
        $sql = "SELECT id, nome, abreviatura, descontar, descricao FROM phpmycall.tipo_feedback";
        return $this->select($sql);
    }

    /**
     * Busca tipo de feedback a partir do id
     *
     * @param int $feedback Código do tipo de feedback
     * @return Array Retorna array com os dados do tipo de feedback
     */
    public function getFeedback($feedback) {
        $sql = "SELECT * FROM phpmycall.tipo_feedback WHERE id = :feedback";

        return $this->select($sql, array('feedback' => $feedback), FALSE);
    }

    /**
     * Atualiza o tipo de feedback
     *
     * @param int $id Código do tipo de feedback
     * @param string $nome Nome do tipo de feedback
     * @param string $abrev Abreviatura do tipo de feedback
     * @param boolean $descontar Descontar do tempo de solução
     * @param string $descricao Descrição do tipo de feedback
     * @return boolean Retorna true se sucesso, false caso contrario
     */
    public function alterar($id, $nome, $abrev, $descontar, $descricao) {
        $dados = array(
            'nome' => $nome,
            'abreviatura' => $abrev,
            'descontar' => $descontar,
            'descricao' => $descricao
        );

        return $this->update('phpmycall.tipo_feedback', $dados, "id = {$id}");
    }

    /**
     * Remove tipo de feedback
     *
     * @param int $id Código do tipo de feedback
     * @return boolean Retorna true se sucesso, false caso contrario.
     */
    public function excluir($id) {
        return $this->delete('phpmycall.tipo_feedback', "id = {$id}");
    }

}
