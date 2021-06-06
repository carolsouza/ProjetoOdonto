<?php

namespace App\Db;

    class Infos{
        
        public static function getEstados(){            

            $estados = [
                'AC' => 'Acre',
                'AL' => 'Alagoas',
                'AP' => 'Amapá',
                'AM' => 'Amazonas',
                'BA' => 'Bahia',
                'CE' => 'Ceará',
                'ES' => 'Espírito Santo',
                'GO' => 'Goiás',
                'MA' => 'Maranhão',
                'MT' => 'Mato Grosso',
                'MS' => 'Mato Grosso do Sul',
                'MG' => 'Minas Gerais',
                'PA' => 'Pará',
                'PB' => 'Paraíba',
                'PR' => 'Paraná',
                'PE' => 'Pernambuco',
                'PI' => 'Piauí',
                'RJ' => 'Rio de Janeiro',
                'RN' => 'Rio Grande do Norte',
                'RS' => 'Rio Grande de Sul',
                'RO' => 'Rondônia',
                'RR' => 'Roraima',
                'SC' => 'Santa Catarina',
                'SP' => 'São Paulo',
                'SE' => 'Sergipe',
                'TO' => 'Tocantins'
            
            ];

            return $estados;
        }

        public static function getQuestoes(){

            $questoes = [
                'hemorragia' => 'Já teve hemorragia?',
                'alergia' => 'Sofre(u) de alergia?',
                'reumatismo' => 'Teve reumatismo infeccioso?',
                'cardio' => 'Sofre(u) de distúrbio cardiovascular?',
                'gastrite' => 'Sofre(u) de gastrite?',
                'diabetes' => 'É diabético ou tem familiares diabéticos?',
                'desmaio' => 'Já desmaiou alguma vez?',
                'trat_medico' => 'Está sob tratamento médico?',
                'medicamento' => 'Está tomando algum medicamento?',
                'doente_operado' => 'Esteve doente ou foi operado nos últimos 5 anos?',
                'vicios' => 'Tem hábitos vícios ou manias?',
                'ansie_depre' => 'Tem ansiedade/depressão?'
            ];

            return $questoes;
        }

        public static function getDoencas(){
            
            $doencas = [
                'tuberculose' => 'Tuberculose',
                'sifilis' => 'Sífilis',
                'hepatite' => 'Hepatite A, B, C',
                'sarampo' => 'Sarampo',
                'caxumba' => 'Caxumba',
                'varicela' => 'Varicela'
            ];

            return $doencas;
        }

        public static function getFisico(){

            $fisico = [
                'labios' => 'Lábios',
                'mucosa_jugal' => 'Mucosa jugal',
                'lingua' => 'Língua',
                'soalho_boca' => 'Soalho da boca',
                'palato_duro' => 'Palato duro',
                'garganta' => 'Garganta',
                'palato_mole' => 'Palato mole',
                'mucosa_alv' => 'Mucosa alveolar',
                'gengivas' => 'Gengivas',
                'gland_saliva' => 'Glândulas salivares',
                'linfonodos' => 'Linfonodos',
                'atm' => 'ATM',
                'musc_mastiga' => 'Músculos mastigadores',
                'oclusao' => 'Oclusão'
            ];

            return $fisico;
        }    

    }