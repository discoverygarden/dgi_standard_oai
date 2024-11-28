<?php

namespace Drupal\dgi_standard_oai\Plugin\OaiMetadataMap;

/**
 * OAI implementation for the oai_qdc metadata profile.
 *
 * Based off of DGI's MMS, at "update 10/22/24".
 *
 * @see https://docs.google.com/spreadsheets/d/1GtXscvRt8QKchVQWcXawCRCPJFxtD8RFbvpZeZsIj9I/edit?gid=227223819#gid=227223819
 *
 * @OaiMetadataMap(
 *   id = "dgi_standard_oai_qdc",
 *   label = @Translation("DGI Standard Qualified Dublin Core"),
 *   metadata_format = "oai_qdc",
 *   template = {
 *     "type" = "module",
 *     "name" = "rest_oai_pmh",
 *     "directory" = "templates",
 *     "file" = "oai-default",
 *   }
 * )
 */
class QDC extends DgiStandard {

  protected const METADATA_NAMESPACE = 'http://worldcat.org/xmlschemas/qdc-1.0/';
  protected const METADATA_SCHEMA = 'http://worldcat.org/xmlschemas/qdc/1.0/qdc-1.0.xsd';

  protected const METADATA_FORMAT = [
    'metadataPrefix' => 'oai_qdc',
    'schema' => self::METADATA_SCHEMA,
    'metadataNamespace' => self::METADATA_NAMESPACE,
  ];

  protected const METADATA_WRAPPER = [
    self::METADATA_FORMAT['metadataPrefix'] . ':qualifieddc' => [
      '@xmlns:dc' => 'http://purl.org/dc/elements/1.1/',
      '@xmlns:dcterms' => 'http://purl.org/dc/terms/',
      '@xmlns:oai_qdc' => self::METADATA_NAMESPACE,
      '@xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
      '@xsi:schemaLocation' => self::METADATA_NAMESPACE . ' ' . self::METADATA_SCHEMA,
    ],
  ];

  protected const TITLE_ELEMENT_MAIN = 'dc:title';

  protected const FIELD_MAPPING = [
    'field_member_of' => 'dcterms:isPartOf',
    'field_resource_type' => 'dcterms:type',
    'field_genre' => 'dcterms:type',
    'field_abstract' => 'dcterms:abstract',
    'field_description' => 'dcterms:description',
    'field_table_of_contents' => 'dcterms:tableOfContents',
    'field_target_audience' => 'dcterms:educationLevel',
    'field_language' => 'dcterms:language',
    'field_local_identifier' => 'dcterms:identifier',
    'field_purl' => 'dcterms:identifier',
    'field_doi' => 'dcterms:identifier',
    'field_handle' => 'dcterms:identifier',
    'field_ark' => 'dcterms:identifier',
    'field_open_url' => 'dcterms:identifier',
    'field_isbn' => 'dcterms:identifier',
    'field_issn' => 'dcterms:identifier',
    'field_ismn' => 'dcterms:identifier',
    'field_repec' => 'dcterms:identifier',
    'field_gpo_number' => 'dcterms:identifier',
    'field_oclc_number' => 'dcterms:identifier',
    'field_pubmed_central_number' => 'dcterms:identifier',
    'field_pubmed_number' => 'dcterms:identifier',
    'field_subject' => 'dcterms:subject',
    'field_subject_name_person' => 'dcterms:subject',
    'field_subject_name_organization' => 'dcterms:subject',
    'field_geographic_subject' => 'dcterms:spatial',
    'field_temporal_subject' => 'dcterms:temporal',
    'field_coordinates' => 'dcterms:spatial',
    'field_geographic_code' => 'dcterms:spatial',
    'field_lcc_classification' => 'dcterms:subject',
    'field_ddc_classification' => 'dcterms:subject',
    'field_sudoc_number' => 'dcterms:subject',
    'field_swank_classification' => 'dcterms:subject',
    'field_state_gov_classification' => 'dcterms:subject',
    'field_conference' => 'dcterms:contributor',
    'field_publication_title' => 'dcterms:isPartOf',
    'field_publication_identifier' => 'dcterms:isPartOf',
    'field_extent' => 'dcterms:extent',
    'field_physical_form' => 'dcterms:medium',
    'field_title_plain' => 'dcterms:relation',
    'field_url' => 'dcterms:relation',
    'field_funder' => 'dcterms:contributor',
    'field_access_conditions' => 'dcterms:accessRights',
    'field_restriction_on_access' => 'dcterms:accessRights',
    'field_use_and_reproduction' => 'dcterms:rights',
    'field_rights_statement' => 'dcterms:rights',
    'field_use_license' => 'dcterms:license',
    'field_copyright_holder' => 'dcterms:rightsHolder',
  ];

  protected const PARAGRAPH_MAPPING = [
    'field_series_paragraph' => [
      'field_series_titles' => 'dcterms:isPartOf',
    ],
    'field_origin_information' => [
      'field_date_created' => 'dcterms:created',
      'field_date_issued' => 'dcterms:issued',
      'field_date_captured' => 'dcterms:date',
      'field_date_valid' => 'dcterms:date',
      'field_date_modified' => 'dcterms:date',
      'field_other_date' => 'dcterms:date',
      'field_copyright_date' => 'dcterms:dateCopyrighted',
      'field_publisher' => 'dcterms:publisher',
    ],
    'field_related_item_paragraph' => [
      'field_title_plain' => 'dcterms:relation',
      'field_url' => 'dcterms:relation',
    ],
  ];

  protected const LINKED_AGENT_MAPPING = [
    'relators:asn' => 'dcterms:contributor',
    'relators:aut' => 'dcterms:creator',
    'relators:ato' => 'dcterms:contributor',
    'relators:cmp' => 'dcterms:creator',
    'relators:cnd' => 'dcterms:contributor',
    'relators:ctb' => 'dcterms:contributor',
    'relators:cph' => 'dcterms:rightsHolder',
    'relators:crp' => 'dcterms:contributor',
    'relators:cre' => 'dcterms:creator',
    'relators:dgc' => 'dcterms:contributor',
    'relators:dgg' => 'dcterms:contributor',
    'relators:dgs' => 'dcterms:contributor',
    'relators:dpc' => 'dcterms:contributor',
    'relators:drt' => 'dcterms:contributor',
    'relators:edt' => 'dcterms:contributor',
    'relators:fnd' => 'dcterms:contributor',
    'relators:hst' => 'dcterms:contributor',
    'relators:his' => 'dcterms:contributor',
    'relators:ive' => 'dcterms:creator',
    'relators:ivr' => 'dcterms:contributor',
    'relators:prf' => 'dcterms:contributor',
    'relators:pht' => 'dcterms:creator',
    'relators:pbl' => 'dcterms:contributor',
    'relators:sgn' => 'dcterms:contributor',
    'relators:spk' => 'dcterms:contributor',
    'relators:spn' => 'dcterms:contributor',
    'relators:vdg' => 'dcterms:contributor',
  ];

  protected const FILE_ELEMENT = FALSE;

  protected const NOTE_DEFAULT_ELEMENT = FALSE;

}
